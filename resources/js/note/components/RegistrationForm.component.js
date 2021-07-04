import React, {useState} from 'react';
import { connect } from 'react-redux';
import { registerUser } from '../redux/actions/AuthActionCreator';

const RegistrationForm = ({dispatchRegisterAction}) => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [confirmPassword, setConfirmPassword] = useState('');
    const name = 'test';

    const hendleOnsubmit = (evet) => {
        evet.preventDefault();
        dispatchRegisterAction(
            name,
            email,
            password,
            (data)=>console.log(data),
            (data)=>console.log(data)
        )
    };
    return (
        <React.Fragment>
            <div className="card">
                <div className="card-body">
                    <h2 className="card-title">New User ?</h2>
                    <h4 className="card-subtitle mb-2 text-muted fs-4">Register here</h4>
                    <form noValidate onSubmit={hendleOnsubmit}>
                        <div className="row">
                            <div className="col-12">
                                <div className="form-group">
                                    <label htmlFor="InputEmail1" className="form-label">Email</label>
                                    <input
                                        type="email"
                                        className="form-control"
                                        id="InputEmail1"
                                        placeholder="email"
                                        value={email}
                                        onChange={(e)=>{ setEmail(e.target.value) }}
                                        aria-describedby="emailHelp"
                                    />
                                    <div id="emailHelp" className="form-text fs-6">We'll never share your email with anyone else.</div>
                                </div>
                            </div>

                            <div className="col-6">
                                <div className="form-group">
                                    <label htmlFor="InputPassword" className="form-label">Password</label>
                                    <input
                                        type="password"
                                        className="form-control"
                                        id="InputPassword"
                                        placeholder="password"
                                        value={password}
                                        onChange={(e)=>{ setPassword(e.target.value) }}
                                        aria-describedby="passwordHelp"
                                    />
                                </div>
                            </div>
                            <div className="col-6">
                                <div className="form-group">
                                    <label htmlFor="confirmPassword" className="form-label">Confirm Password</label>
                                    <input
                                        type="password"
                                        className="form-control"
                                        id="confirmPassword"
                                        placeholder="confirm password"
                                        value={confirmPassword}
                                        onChange={(e)=>{ setConfirmPassword(e.target.value) }}
                                        aria-describedby="confirmPassword"
                                    />
                                </div>
                            </div>
                            <div className="col-6">
                                <button type="submit" className="btn btn-primary mt-2">Register</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </React.Fragment>
    );
};

const mapDispatchToProps = dispatch => ({
        dispatchRegisterAction : (name,email,password,onSuccess,onError) =>
            dispatch(
                registerUser(
                    {name,email,password},
                    onSuccess,
                    onError
                )
            )
    }
);

export default connect(null,mapDispatchToProps)(RegistrationForm);
