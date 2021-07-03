import React from 'react';
import LoginForm from '../components/LoginForm.component';
import RegistrationForm from '../components/RegistrationForm.component';

const Auth = () => (
    <div className="row justify-content-between mt-5">
        <div className="col-6">
            <LoginForm />
        </div>
        <div className="col-6 border-left">
            <RegistrationForm />
        </div>
    </div>
)

export default Auth;
