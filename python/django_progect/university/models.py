from django.db import models


class University(models.Model):
    full_name = models.CharField(max_length=150, unique=True)
    abbreviation = models.CharField(max_length=10)
    date_foundation = models.DateField()
    
    def __str__(self):
        return self.abbreviation
    

class Student(models.Model):
    name = models.CharField(max_length=100)
    birthday = models.DateField()
    university = models.ForeignKey(University, on_delete=models.CASCADE)
    year_admission = models.IntegerField()
    
    def __str__(self):
        return self.name
