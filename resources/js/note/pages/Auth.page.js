import React from 'react';
import LoginForm from '../components/LoginForm.component';
import RegistrationForm from '../components/RegistrationForm.component';

const Auth = () => (
    <div className="row justify-content-between">
        <div className="col-5">
            <LoginForm />
        </div>
        <div style={{border:'1px solid #ababab'}}></div>
        <div className="col-5">
            <RegistrationForm />
        </div>
    </div>
)

export default Auth;
