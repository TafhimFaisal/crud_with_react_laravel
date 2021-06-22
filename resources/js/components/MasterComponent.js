import React from 'react';
import ReactDOM from 'react-dom';

function MasterComponent() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Master Component</div>

                        <div className="card-body">I'm an Master Component component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default MasterComponent;

if (document.getElementById('example')) {
    ReactDOM.render(
        <MasterComponent />,
        document.getElementById('example')
    );
}
