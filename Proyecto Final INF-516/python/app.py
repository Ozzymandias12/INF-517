# framework para el API
from flask import Flask

# para el cliente de conexión a mango
from pymongo import MongoClient
from bson.json_util import dumps

# permitir cors
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

client = MongoClient('localhost')

# consultar las calificaciones
cursor = client['labpro3']['calificaciones'].find({},{'_id':0})
documents = [doc for doc in cursor]

# ruta /calificaciones
@app.route('/calificaciones')
def dbs():
    response = app.response_class (
        response=dumps(documents),
        status=200,
        mimetype='application/json'
    )
    response.headers.add("Access-Control-Allow-Origin", "*")
    return response
   
if(__name__ == '__main__'):
    app.run(debug=True, port=4000)
