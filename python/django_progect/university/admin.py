from django.contrib import admin
from .models import University, Student

class StudentAdmin(admin.ModelAdmin):
    list_display = ('id', 'name', 'university')

admin.site.register(Student, StudentAdmin)

class UniversityAdmin(admin.ModelAdmin):
    list_display = ('full_name', )
    
admin.site.register(University, UniversityAdmin)