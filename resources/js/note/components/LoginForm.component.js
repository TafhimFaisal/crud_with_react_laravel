// import React from 'react';
import React, {useState} from 'react'

const LoginForm = () => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    return (
        <React.Fragment>
            <div className="card">
                <div className="card-body">
                    <h2 className="card-title">Have an Account ?</h2>
                    <h4 className="card-subtitle mb-2 text-muted fs-4">Login hare</h4>
                    <form noValidate action="">
                        <div className="form-group">
                            <label htmlFor="InputEmail1" className="form-label">Email</label>
                            <input
                                type="email"
                                className="form-control"
                                id="InputEmail1"
                                placeholder="Enter Your Email"
                                value={email}
                                onChange={(e)=>{ setEmail(e.target.value) }}
                                aria-describedby="emailHelp"
                            />
                            <div id="emailHelp" className="form-text fs-6">We'll never share your email with anyone else.</div>
                        </div>
                        <div className="form-group">
                            <label htmlFor="InputPassword" className="form-label">Password</label>
                            <input
                                type="password"
                                className="form-control"
                                id="InputPassword"
                                placeholder="Enter Your password"
                                value={password}
                                onChange={(e)=>{ setPassword(e.target.value) }}
                                aria-describedby="passwordHelp"
                            />
                        </div>
                        <button type="submit" className="btn btn-primary mt-2">Login</button>
                    </form>

                </div>
            </div>
        </React.Fragment>
    );
};

export default LoginForm;
