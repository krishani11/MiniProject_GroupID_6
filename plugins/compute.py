import sys
import pandas as pd
import numpy as np
import random
# import json 
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.metrics.pairwise import cosine_similarity



def get_title_from_index_bf(index):
	return df_breakfast[df_breakfast.s_no == index]["name"].values[0]
def get_title_from_index_meals(index):
	return df_meals[df_meals.s_no == index]["name"].values[0]
def get_title_from_index_snacks(index):
	return df_snacks[df_snacks.s_no == index]["name"].values[0]
def get_title_from_index_dinner(index):
	return df_dinner[df_dinner.s_no == index]["name"].values[0]

def get_index_from_bf(title):
	return df_breakfast[df_breakfast.name == title]["s_no"].values[0]
def get_index_from_meals(title):
	return df_meals[df_meals.name == title]["s_no"].values[0]
def get_index_from_snacks(title):
	return df_snacks[df_snacks.name == title]["s_no"].values[0]
def get_index_from_dinner(title):
	return df_dinner[df_dinner.name == title]["s_no"].values[0]

try:
    bf_cal = sys.argv[1]
    lun_cal = sys.argv[2]
    din_cal = sys.argv[3]
    sn_cal = 0
    if(len(sys.argv)==8): sn_cal = sys.argv[7]
except Exception as e:
    print("exc sys1 -> ",str(e))

#print(len(sys.argv))
try:
    pref_bf = sys.argv[4]
except Exception as e:
    print("exc sys21 -> ",str(e))

try:
    pref_lun = sys.argv[5]
except Exception as e:
    print("exc sys22 -> ",pref_lun)
try:
    pref_din = sys.argv[6]
except Exception as e:
    print("exc sys23 -> ",pref_din)





try:
    df_breakfast = pd.read_csv('indian_breakfast.csv')
    #print(df_breakfast.head(5))
    #print()
    df_meals = pd.read_csv('indian_meals.csv')
    #print(df_meals.head(5))
    #print()
    df_snacks = pd.read_csv('indian_snacks.csv')
    #print(df_snacks.head(5))
    #print()
    df_dinner = pd.read_csv('indian_dinner.csv')
    # ref_meals_df = df_meals.filter(['s_no','name','carbs','protein','fat','total_cal','vn'])
    # #print(ref_meals_df)
    # #print()
    # df_dinner = ref_meals_df.append(df_breakfast, ignore_index=True)
    #print(df_dinner.head(5))
    #print()
except Exception as e:
    print("exc 1 -> ",str(e))

try:
    final_bf_df = df_breakfast[df_breakfast['total_cal']<=(float(bf_cal)+50.0)]
    df_meals = df_meals[df_meals['total_cal']<=(float(lun_cal)+50.0)]
    final_din_df = df_dinner[df_dinner['total_cal']<=(float(din_cal)+50.0)]
    if (len(sys.argv)==8):
        #s_is_allowed = abs(df_snacks['total_cal']-sn_cal)<=50
        final_sn_df = df_snacks[df_snacks['total_cal']<=(float(sn_cal)+50.0)]
except Exception as e:
    print("exc filter -> ",str(e))

features=['carbs','protein','fat']


def combine_features(row):
    try:
        return str(row['carbs'])+" "+str(row['protein'])+" "+str(row['fat'])
    except Exception as e:
        #print("Error",row)
        print("exception -> ",e)

try:
    df_breakfast["combine_features"]=df_breakfast.apply(combine_features,axis=1)

    #print(df_breakfast["combine_features"].head(5))

    df_meals["combine_features"]=df_meals.apply(combine_features,axis=1)

    #print(df_meals["combine_features"].head(5))

    #df_snacks["combine_features"]=df_snacks.apply(combine_features,axis=1)

    #print(df_snacks["combine_features"].head(5))

    df_dinner["combine_features"]=df_dinner.apply(combine_features,axis=1)
        
    #print("combined_attributes",df_dinner["combined_features"].head())
except Exception as e:
    print("exc combine-> ",str(e))

cv=CountVectorizer()
try:
    count_matrix1=cv.fit_transform(df_breakfast["combine_features"])
    count_matrix2=cv.fit_transform(df_meals["combine_features"])
    #count_matrix3=cv.fit_transform(df_snacks["combine_features"])
    count_matrix4=cv.fit_transform(df_dinner["combine_features"])
except Exception as e:
    print("exc count_vector -> ",str(e))

try:
    cosine_sim1=cosine_similarity(count_matrix1)
    cosine_sim2=cosine_similarity(count_matrix2)
    #cosine_sim3=cosine_similarity(count_matrix3)
    cosine_sim4=cosine_similarity(count_matrix4)
except Exception as e:
    print("exc cos_sim -> ",str(e))

try:
    bf_user_likes=pref_bf
    #snacks_user_likes="gavvalu"
    meals_user_likes=pref_lun
    dinner_user_likes=pref_din
except Exception as e:
    print("exc user_likes -> ",str(e))

try:
    # print(meals_user_likes)
    bf_index = get_index_from_bf(bf_user_likes)
    # print(meals_user_likes)
    meals_index = get_index_from_meals(meals_user_likes)
    #snacks_index = get_index_from_snacks(snacks_user_likes)
    # print(meals_user_likes)
    dinner_index = get_index_from_dinner(dinner_user_likes)
    # print(meals_user_likes)
except Exception as e:
    print("exc find_index -> ",str(e))

try:
    similar_bf=list(enumerate(cosine_sim1[bf_index]))
    similar_meal=list(enumerate(cosine_sim2[meals_index]))
    #similar_snacks=list(enumerate(cosine_sim1[snacks_index]))
    similar_dinner=list(enumerate(cosine_sim4[dinner_index]))
except Exception as e:
    print("exc enumerate -> ",str(e))

try:
    sorted_similar_bf=sorted(similar_bf,key=lambda x:x[1],reverse=True)
    sorted_similar_meals=sorted(similar_meal,key=lambda x:x[1],reverse=True)
    #sorted_similar_snacks=sorted(similar_snacks,key=lambda x:x[1],reversed=True)
    sorted_similar_dinner=sorted(similar_dinner,key=lambda x:x[1],reverse=True)
except Exception as e:
    print("exc sort-> ",str(e))


bf_final_items = list()
lun_final_items = list()
din_final_items = list()
try:
    for bf in sorted_similar_bf:
        bf_final_items.append(str(get_title_from_index_bf(bf[0]))) 
        #print(str(get_title_from_index_bf(bf[0])))
except Exception as e:
    print("")
try:
    for meal in sorted_similar_meals:
        lun_final_items.append(get_title_from_index_meals(meal[0]))
except Exception as e:
    print("")
try:
    for dinner in sorted_similar_dinner:
        din_final_items.append(get_title_from_index_dinner(dinner[0]))
except Exception as e:
    print("")

selected_bf = random.choice(bf_final_items)
selected_lun = random.choice(lun_final_items)
selected_din = random.choice(din_final_items)

print(selected_bf,",",selected_lun,",",selected_din)
if(len(sys.argv)==8):
    try:
        sn_final_items = final_sn_df['name'].values.tolist()
        selected_sn = random.choice(sn_final_items)
        print(",",selected_sn)
    except Exception as e:
        print("snacks->",str(e))







# print (json.dumps(bf_final_items))



# string = ","
# print(string.join(bf_final_items))
# print (string.join(bf_final_items),';',','.join(lun_final_items),';',','.join(din_final_items))
# print(';')
# print(','.join(lun_final_items))
# print(';')
# print(','.join(din_final_items))
    

# print(sorted_similar_meals[0])
# print(sorted_similar_meals[1])

# i=0
# for bf in sorted_similar_bf:
#     print(get_title_from_index_bf(bf[0]))
#     i=i+1
#     if i>3:
#         break
# i=0
# for meal in sorted_similar_meals:
#     print(get_title_from_index_meals(meal[0]))
#     i=i+1
#     if i>3:
#         break
# i=0
# for snack in sorted_similar_snacks:
#     print(get_title_from_index_snacks(snack[0]))
#     i=i+1
#     if i>3:
#         break
# i=0
# for dinner in sorted_similar_dinner:
#     print(get_title_from_index_dinner(dinner[0]))
#     i=i+1
#     if i>3:
#         break











