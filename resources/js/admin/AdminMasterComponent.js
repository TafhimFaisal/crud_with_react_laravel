import React from 'react';
import ReactDOM from 'react-dom';

function AdminMasterComponent() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Admin Component</div>

                        <div className="card-body">I'm an Master Component component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default AdminMasterComponent;

if (document.getElementById('admin')) {
    ReactDOM.render(<AdminMasterComponent />, document.getElementById('admin'));
}
