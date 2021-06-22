import React from 'react';
import ReactDOM from 'react-dom';

function UserMasterComponent() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">User Component</div>

                        <div className="card-body">I'm an Master Component component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default UserMasterComponent;

if (document.getElementById('user')) {
    ReactDOM.render(<UserMasterComponent />, document.getElementById('user'));
}
