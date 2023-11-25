from flask import Flask
from flask_sqlalchemy import SQLAlchemy
from flask_login import UserMixin

university = Flask(__name__)
university.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+pymysql://root:root@localhost:3300/infopoisk_django'
db = SQLAlchemy(university)


class University_university(db.Model):
    id = db.Column(db.BigInteger, primary_key=True)
    full_name = db.Column(db.String(150), unique=True)
    abbreviation = db.Column(db.String(10))
    date_foundation = db.Column(db.Date)

    def __repr__(self):
        return self.abbreviation


class University_student(db.Model):
    id = db.Column(db.BigInteger, primary_key=True)
    name = db.Column(db.String(100))
    birthday = db.Column(db.Date)
    university_id = db.Column(db.BigInteger, db.ForeignKey('university_university.id'))
    university = db.relationship('University_university', backref='students')
    year_admission = db.Column(db.Integer)


class User(db.Model, UserMixin):
    id = db.Column(db.BigInteger, primary_key=True)
    login = db.Column(db.String(100))
    password = db.Column(db.String(100))

    def check_password(self, password) -> bool:
        return self.password == password
