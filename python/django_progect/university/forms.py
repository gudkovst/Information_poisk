from django import forms
from .models import University, Student

class UniversityForm(forms.ModelForm):
    class Meta:
        model = University
        fields = ('full_name', 'abbreviation', 'date_foundation')

    
class StudentForm(forms.ModelForm):
    class Meta:
        model = Student
        fields = ('name', 'birthday', 'university', 'year_admission')
