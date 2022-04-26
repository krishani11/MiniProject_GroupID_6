# import firebase_admin
# from firebase_admin import credentials
# from firebase_admin import db

# cred = credentials.Certificate('./includes/svasthya-12892-firebase-adminsdk-me81o-73591b35fe.json')

# firebase_admin.initialize_app(cred, {
#     'databaseURL' : 'https://svasthya-12892.firebaseio.com/'
# })

import sys
import pandas as pd
import numpy as np
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.metrics.pairwise import cosine_similarity


#def get_title_from_index(index):
#	return df[df.index == index]["title"].values[0]

#def get_index_from_title(title):
#	return df[df.title == title]["index"].values[0]

# total_calorie = sys.argv[1]
# user_key = sys.argv[2]
# print(user_key)
# print(total_calorie)

bf_cal = sys.argv[1]
lun_cal = sys.argv[2]
din_cal = sys.argv[3]
sn_cal = 0
if(len(sys.argv)==5): sn_cal = sys.argv[4]

try:
    df_breakfast = pd.read_csv("indian_breakfast.csv")
    #print(df_breakfast.head(5))
    df_meals = pd.read_csv("indian_meals.csv")
    df_snacks = pd.read_csv("indian_snacks.csv")
    df_dinner = pd.read_csv('indian_dinner.csv')
    # ref_meals_df = df_meals.filter(['s_no','name','carbs','protein','fat','total_cal','vn'])
    # df_dinner = ref_meals_df.append(df_breakfast, ignore_index=True)
    #print(df_dinner)
except Exception as e:
    print("exc 1 -> ",str(e))

try:
    final_bf_df = df_breakfast[df_breakfast['total_cal']<=(float(bf_cal)+50.0)]
    #final_bf_df = df_breakfast[b_is_allowed]
    bf_head = final_bf_df.head(3)
    bf_head_names = bf_head['name']
except Exception as e:
    print("exc 2 -> ",str(e))

#l_is_allowed = abs(df_meals['total_cal']-lun_cal)<=50
final_lun_df = df_meals[df_meals['total_cal']<=(float(lun_cal)+50.0)]
lun_head = final_lun_df.head(3)
lun_head_names = lun_head['name']

try:
    #d_is_allowed = abs(df_dinner['total_cal']-din_cal)<=50
    final_din_df = df_dinner[df_dinner['total_cal']<=(float(din_cal)+50.0)]
    din_head = final_din_df.head(3)
    din_head_names = din_head['name']
except Exception as e:
    print("exc 3 -> ",str(e))

bf_test_set = bf_head_names.to_string(index=False).split('\n')
lunch_test_set = lun_head_names.to_string(index=False).split('\n')
dinner_test_set = din_head_names.to_string(index=False).split('\n')

#din_vals = [','.join(ele.split()) for ele in dinner_test_set]


if (len(sys.argv)==5):
    #s_is_allowed = abs(df_snacks['total_cal']-sn_cal)<=50
    final_sn_df = df_snacks[df_snacks['total_cal']<=(float(sn_cal)+50.0)]
    sn_head = final_sn_df.head(3)
    sn_head_names = sn_head['name']
    sn_test_set = sn_head_names.to_string(index=False).split('\n')

    print(bf_test_set,';',lunch_test_set,';',dinner_test_set,';',sn_test_set)


    
else: print(bf_test_set,';',lunch_test_set,';',dinner_test_set)





# ref = db.reference('profiledb/')
# user_ref = ref.child('saketha0005')
# print(user_ref.get())

