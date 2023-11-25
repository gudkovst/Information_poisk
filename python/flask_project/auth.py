from flask import Blueprint, request, render_template, redirect
from flask_login import current_user, login_user, login_required, logout_user
from forms import UserForm
from models import User, db

auth_blueprint = Blueprint('auth_blueprint', __name__, template_folder='templates')


@auth_blueprint.route('/login/', methods=['GET', 'POST'])
def login():
    if request.method == "GET":
        return render_template('login.html', form=UserForm(), request=request.referrer)
    u_login = request.form.get("login")
    u_pass = request.form.get("password")
    user = User.query.filter(User.login == u_login).first()
    if user and user.check_password(u_pass):
        login_user(user)
        print(current_user.is_authenticated)
        return redirect(request.args.get('next'))
    return redirect('/login/')

@auth_blueprint.route('/registration/', methods=['GET', 'POST'])
def registration():
    if request.method == "GET":
        return render_template('registration.html', form=UserForm())
    u_login = request.form.get("login")
    u_pass = request.form.get("password")
    user = User(login=u_login, password=u_pass)
    try:
        db.session.add(user)
        db.session.commit()
    except Exception as err:
        print(f"Exception: {type(err)}: {err.args}")
    return redirect('/login/')

@auth_blueprint.route('/logout/')
@login_required
def logout():
    logout_user()
    return redirect('/university_list/')
