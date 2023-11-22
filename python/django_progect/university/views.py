from django.shortcuts import render
from django.template.response import TemplateResponse
from django.http import HttpResponseRedirect, HttpResponseNotFound
from . import forms
from . import models

def index(request):
    return TemplateResponse(request, "index.html")


def create_university(request):
    if request.method == "POST":
        u_name = request.POST.get("full_name")
        u_abb = request.POST.get("abbreviation")
        u_date = request.POST.get("date_foundation")
        #Добавляем в базу данных
        univer = models.University.objects.create(full_name=u_name, abbreviation=u_abb, date_foundation=u_date)
        #Получаем id добавленного для того, чтобы перейти на его страницу
        new_id = univer.id
        return HttpResponseRedirect(f"/university/university/{new_id}")
    else:
        data = {"form": forms.UniversityForm()}
        return TemplateResponse(request, "create_university.html", data)
    
def university(request, id): #read university
    try:
        univer = models.University.objects.get(id=id)
        data = {"u_name": univer.full_name, "u_abb":univer.abbreviation, "u_date":univer.date_foundation}
        return TemplateResponse(request, "university.html", data)
    except models.University.DoesNotExist:
        return HttpResponseNotFound("Такого Университета не существует")
    
def update_university(request, id):
    try:
        if request.method == "POST":
            u_name = request.POST.get("full_name")
            u_abb = request.POST.get("abbreviation")
            u_date = request.POST.get("date_foundation")
            models.University.objects.filter(id=id).update(full_name=u_name, abbreviation=u_abb, date_foundation=u_date)
            return HttpResponseRedirect(f"/university/university/{id}")
        else:
            univer = models.University.objects.get(id=id)
            data = {"form": forms.UniversityForm(instance=univer)}
            return TemplateResponse(request, "create_university.html", data)
    except models.University.DoesNotExist:
        return HttpResponseNotFound("Такого Университета не существует")

def delete_university(request, id):
    try:
        univer = models.University.objects.get(id=id)
        univer.delete()
        return HttpResponseRedirect("/university/university_list/")
    except models.University.DoesNotExist:
        return HttpResponseNotFound("Такого Университета не существует")

def university_list(request):
    #Получаем все из базы
    all_univers = models.University.objects.all()
    data = {"univers": all_univers}
    return TemplateResponse(request, "university_list.html", data)


def create_student(request):
    if request.method == "POST":
        s_name = request.POST.get("name")
        s_birthday = request.POST.get("birthday")
        s_university = request.POST.get("university")
        s_university = models.University.objects.get(id=s_university)
        s_year = request.POST.get("year_admission")
        #Добавляем в базу данных
        student = models.Student.objects.create(name=s_name, birthday=s_birthday, university=s_university, year_admission=s_year)
        #Получаем id добавленного для того, чтобы перейти на его страницу
        new_id = student.id
        return HttpResponseRedirect(f"/university/student/{new_id}")
    else:
        data = {"form": forms.StudentForm()}
        return TemplateResponse(request, "create_student.html", data)
    
def student(request, id): #read student
    try:
        student = models.Student.objects.get(id=id)
        univer = student.university.abbreviation
        data = {"s_name": student.name, "s_birthday":student.birthday, "s_university":univer, "s_year":student.year_admission}
        return TemplateResponse(request, "student.html", data)
    except models.Student.DoesNotExist:
        return HttpResponseNotFound("Такого Студента не существует")
    
def update_student(request, id):
    try:
        if request.method == "POST":
            s_name = request.POST.get("name")
            s_birthday = request.POST.get("birthday")
            s_university = request.POST.get("university")
            s_year = request.POST.get("year_admission")
            models.Student.objects.filter(id=id).update(name=s_name, birthday=s_birthday, university=s_university, year_admission=s_year)
            return HttpResponseRedirect(f"/university/student/{id}")
        else:
            student = models.Student.objects.get(id=id)
            data = {"form": forms.StudentForm(instance=student)}
            return TemplateResponse(request, "create_student.html", data)
    except models.University.DoesNotExist:
        return HttpResponseNotFound("Такого Студента не существует")

def delete_student(request, id):
    try:
        models.Student.objects.get(id=id).delete()
        return HttpResponseRedirect("/university/student_list/")
    except models.University.DoesNotExist:
        return HttpResponseNotFound("Такого Студента не существует")

def student_list(request):
    #Получаем все из базы
    all_students = models.Student.objects.all()
    data = {"students": all_students}
    return TemplateResponse(request, "student_list.html", data)