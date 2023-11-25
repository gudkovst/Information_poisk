from flask import Blueprint, request, redirect, render_template
from flask_login import login_required
from models import University_university, University_student, db
from forms import UniversityForm, StudentForm

view_blueprint = Blueprint('view_blueprint', __name__, template_folder='templates')


@view_blueprint.route('/')
def index():
    return render_template('index.html')


@view_blueprint.route('/university/', methods=['GET', 'POST'])
@login_required
def create_university():
    if request.method == "GET":
        return render_template('create_university.html', form=UniversityForm())
    u_name = request.form.get("full_name")
    u_abb = request.form.get("abbreviation")
    u_date = request.form.get("date_foundation")
    university = University_university(full_name=u_name, abbreviation=u_abb, date_foundation=u_date)
    db.session.add(university)
    db.session.commit()
    id = university.id
    return redirect(f'/university/{id}')

@view_blueprint.route('/university/<int:id>/', methods=['GET'])
def read_university(id):
    university = University_university.query.get(id)
    return render_template('university.html', university=university)

@view_blueprint.route('/university/update/<int:id>/', methods=['GET', 'POST'])
@login_required
def update_university(id):
    university = University_university.query.get(id)
    if request.method == "GET":
        return render_template('create_university.html', form=UniversityForm(obj=university))
    university.full_name = request.form.get("full_name")
    university.abbreviation = request.form.get("abbreviation")
    university.date_foundation = request.form.get("date_foundation")
    db.session.commit()
    return redirect(f'/university/{id}')

@view_blueprint.route('/university/delete/<int:id>/')
@login_required
def delete_university(id):
    university = University_university.query.get(id)
    db.session.delete(university)
    db.session.commit()
    return redirect('/university_list/')

@view_blueprint.route('/university_list/')
def university_list():
    univers = University_university.query.all()
    return render_template('university_list.html', univers=univers)


@view_blueprint.route('/student/', methods=['GET', 'POST'])
@login_required
def create_student():
    if request.method == "GET":
        form = StudentForm()
        form.university.query = University_university.query.all()
        return render_template('create_student.html', form=form)
    s_name = request.form.get("name")
    s_birthday = request.form.get("birthday")
    s_university = request.form.get("university")
    s_year = request.form.get("year_admission")
    student = University_student(name=s_name, birthday=s_birthday, university_id=s_university, year_admission=s_year)
    db.session.add(student)
    db.session.commit()
    id = student.id
    return redirect(f'/student/{id}')

@view_blueprint.route('/student/<int:id>/')
def read_student(id):
    student = University_student.query.get(id)
    return render_template('student.html', student=student)

@view_blueprint.route('/student/update/<int:id>/', methods=['GET', 'POST'])
@login_required
def update_student(id):
    student = University_student.query.get(id)
    if request.method == "GET":
        form = StudentForm(obj=student)
        form.university.query = University_university.query.all()
        return render_template('create_student.html', form=form)
    student.name = request.form.get("name")
    student.birthday = request.form.get("birthday")
    student.university_id = request.form.get("university")
    student.year_admission = request.form.get("year_admission")
    db.session.commit()
    return redirect(f'/student/{id}')

@view_blueprint.route('/student/delete/<int:id>/')
@login_required
def delete_student(id):
    student = University_student.query.get(id)
    db.session.delete(student)
    db.session.commit()
    return redirect('/student_list/')

@view_blueprint.route('/student_list/')
def student_list():
    students = University_student.query.all()
    return render_template('student_list.html', students=students)
