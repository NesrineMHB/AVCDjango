# -*- coding: utf-8 -*-
from __future__ import unicode_literals

import json
import urllib
 
from django.shortcuts import render, redirect
from django.conf import settings

from AVCProject import settings as s

from django.contrib import messages

from . import estimator as est

from app1.models import Newsletters
# Create your views here.


def index(request):
    if request.method == 'GET':
        return render(request,"index.html")
        
    if request.method == 'POST':
        if request.POST['send'] =="newsletter":
            #insertion
            email = request.POST["email"]
            if len(Newsletters.objects.filter(email=email)) ==0:
                messages.success(request, 'Subscription success.')
                b = Newsletters(email=email)
                b.save()

            else : 
                messages.error(request, 'Vous etes deja inscrit.')

            return render(request,"index.html",{"subscribe":True})


   
    return render(request,"index.html")



def tester(request):

    
    if request.method == 'POST':

        #newsletter
        if request.POST['send'] =="newsletter":
            #insertion
            email = request.POST["email"]
            if len(Newsletters.objects.filter(email=email)) ==0:
                messages.success(request, 'Subscription success.')
                b = Newsletters(email=email)
                b.save()

            else : 
                messages.error(request, 'Vous etes deja inscrit.')

            return render(request,"volunteer.html",{"subscribe":True})




        else :
            #----- form -----#
            genre = request.POST['genre']
            hypertension = request.POST['hypertension']
            maladie = request.POST['maladie']
            marie = request.POST['marie']
            travail = request.POST['travail']
            zone = request.POST['zone']
            age = request.POST['age']
            glycemie = request.POST['glycemie']
            imc = request.POST['imc']    
            tabac = request.POST['tabac']

            #print("gggihhhhhhhhhhhhhhhhhh",request.POST['send'])

            recaptcha_response = request.POST.get('g-recaptcha-response')
            url = 'https://www.google.com/recaptcha/api/siteverify'
            values = {
            'secret': settings.GOOGLE_RECAPTCHA_SECRET_KEY,
            'response': recaptcha_response
            }
            data = urllib.parse.urlencode(values).encode()
            req =  urllib.request.Request(url, data=data)
            response = urllib.request.urlopen(req)
            result = json.loads(response.read().decode())



            res = True
            if int(age) <0 :
                res = False
                messages.error(request, 'Invalid age. Please try again.')

            if int(glycemie) <0 :
                res = False
                messages.error(request, 'Invalid glycemie. Please try again.')

            if int(imc) <0 :
                res = False
                messages.error(request, 'Invalid imc. Please try again.')
                
            if not res :
                
                return render(request,"volunteer.html",{'msg':True})
            
            else : 
                
                res = est.prediction(s.mlp,genre,age,hypertension,maladie,marie,travail,zone,glycemie,imc,tabac)[0][0]
            
            #=====================res = resultat de fonction de prediction 
            print (res)
            if res > 0.5 : 
                messages.error(request, 'Risque AVC Existant.')
                return render(request,"volunteer.html",{'res': res*100 //1 , 'msg':True})
            else :
                messages.success(request, 'Pas de risque AVC.')
                return render(request,"volunteer.html",{'res': False  , 'msg':True})

        
    if request.method == 'GET':
        return render(request,"volunteer.html")
    
    else:
        
        return render(request,"volunteer.html")
        
