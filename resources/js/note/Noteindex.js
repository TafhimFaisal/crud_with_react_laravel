import React from 'react';
import ReactDOM from 'react-dom';

function Noteindex() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Noteindex Component</div>
                        <div className="card-body">I'm an example component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Noteindex;

if (document.getElementById('app')) {
    ReactDOM.render(<Noteindex />, document.getElementById('app'));
}
