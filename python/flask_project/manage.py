from flask_login import LoginManager
from models import university, User
from views import view_blueprint
from auth import auth_blueprint

university.register_blueprint(view_blueprint)
university.register_blueprint(auth_blueprint)
university.config['SECRET_KEY'] = 'a really really really really long secret key'
login_manager = LoginManager()
login_manager.login_view = 'auth_blueprint.login'
login_manager.init_app(university)

@login_manager.user_loader
def load_user(id):
    return User.query.get(id)


if __name__ == "__main__":
    university.run()
