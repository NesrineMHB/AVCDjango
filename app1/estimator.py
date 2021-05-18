


import pandas as pd
from sklearn.model_selection import train_test_split

def processing(path):

    df_avc = pd.read_csv(path)

    #sépération Train/Test
    Xtrain, Xtest, Ytrain, Ytest = train_test_split(df_avc[['Genre', 'Age', 'Hypertension', 'Maladie_cardiaque', 'Deja_marie', 'Type_job', 'Zone_residence', 'Glycemie', 'IMC', 'Fumeur']], df_avc['AVC'], test_size=0.20, random_state=42)
  
    return df_avc, Xtrain, Xtest, Ytrain, Ytest

def prediction(estimator,G:int, A:int, H:int, MC:int, DM:int, TJ:int, ZR:int, Gly:int, imc:int, F:int):
    data={'Genre':[G],'Age':[A],'Hypertension':[H],'Maladie_cardiaque':[MC],'Deja_marie':[DM],'Type_job':[TJ],'Zone_residence':[ZR],'Glycemie':[Gly],'IMC':[imc],'Fumeur':[F]}
    df = pd.DataFrame(data)
    print(df.shape)
    return estimator.predict_proba(df)

