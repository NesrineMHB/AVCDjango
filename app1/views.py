# -*- coding: utf-8 -*-
from __future__ import unicode_literals

import json
import urllib
 
from django.shortcuts import render, redirect
from django.conf import settings
from django.contrib import messages
 
# Create your views here.


def index(request):
    if request.method == 'GET':
        return render(request,"index.html")
        
    if request.method == 'POST':
        return render(request,"volunteer.html")

   
    return render(request,"volunteer.html")



def tester(request):
    if request.method == 'GET':
        return render(request,"volunteer.html")
    
    if request.method == 'POST':
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


        ecaptcha_response = request.POST.get('g-recaptcha-response')
        url = 'https://www.google.com/recaptcha/api/siteverify'
        values = {
           'secret': settings.GOOGLE_RECAPTCHA_SECRET_KEY,
           'response': recaptcha_response
        }
        data = urllib.parse.urlencode(values).encode()
        req =  urllib.request.Request(url, data=data)
        response = urllib.request.urlopen(req)
        result = json.loads(response.read().decode())

        if result['success']:
           print("yes")
           messages.success(request, 'New comment added with success!')
        else:
           print("no")
           messages.error(request, 'Invalid reCAPTCHA. Please try again.')
           
        return render(request,"volunteer.html")
    else:
        
        return render(request,"volunteer.html")
        
