from wtforms_alchemy import ModelForm, QuerySelectField
from models import University_student, University_university, User


class UniversityForm(ModelForm):
    class Meta:
        model = University_university


class StudentForm(ModelForm):
    class Meta:
        model = University_student

    university = QuerySelectField('university')


class UserForm(ModelForm):
    class Meta:
        model = User
