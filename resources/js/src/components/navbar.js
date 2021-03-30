import React, {Component} from 'react';
import { Link } from "react-router-dom";
class Navbar extends Component {
    render() {
        return (
            <div className="container">
                <div className="row">
                    <div className="col-12">
                        <nav className="navbar navbar-expand-lg navbar-light bg-light">
                            <Link className="navbar-brand" to="/blog">NavBar</Link>
                            <div className="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul className="navbar-nav mr-auto">
                                    <li className="nav-item active">
                                        <Link className="nav-link" to="/blog">Home</Link>
                                    </li>
                                    <li className="nav-item">
                                        <Link className="nav-link" to="/dashboard">Dashboard</Link>
                                    </li>
                                    <li className="nav-item">
                                        <Link className="nav-link" to="/createpost">Create</Link>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        );
    }
}

export default Navbar;