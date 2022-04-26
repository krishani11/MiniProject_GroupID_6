import firebase_admin
from firebase_admin import credentials
from firebase_admin import db

cred = credentials.Certificate('./includes/svasthya-12892-firebase-adminsdk-me81o-73591b35fe.json')

firebase_admin.initialize_app(cred, {
    'databaseURL' : 'https://svasthya-12892.firebaseio.com/'
})
