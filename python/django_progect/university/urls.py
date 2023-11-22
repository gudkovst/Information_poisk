from django.urls import path
from . import views

urlpatterns = [
    path('', views.index),
    
    path('university/<int:id>/', views.university),
    path('university/', views.create_university),
    path('university_list/', views.university_list),
    path('university/delete/<int:id>/', views.delete_university),
    path('university/update/<int:id>/', views.update_university),
    
    path('student/<int:id>/', views.student),
    path('student/', views.create_student),
    path('student_list/', views.student_list),
    path('student/delete/<int:id>/', views.delete_student),
    path('student/update/<int:id>/', views.update_student)
]