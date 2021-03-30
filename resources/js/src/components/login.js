import React from 'react'
import ReactDom from 'react-dom'
import axios from  'axios';
import { Redirect } from "react-router-dom";

class Login extends React.Component{
    constructor(props) {
        super(props);
        this.state = {
            username:'',
            password: '',
            userNiceName:'',
            loggedIn:false,
            token:'',
            redirect:false,
        }
        this.handleChange = this.handleChange.bind(this);
        this.submitForm = this.submitForm.bind(this);
    }
    submitForm (e){
        e.preventDefault();
        let data = {
            username: this.state.username,
            password: this.state.password,
        }
        axios.post('http://localhost/azizulhasan/pro/wp-json/jwt-auth/v1/token', data).then(res=>{
            console.log(res.data)
            localStorage.setItem('token', res.data.token);
            localStorage.setItem('user_nicename', res.data.user_nicename);

            if(res.data.user_nicename || localStorage.getItem('token')){
                this.setState({redirect: true})
                console.log(this.state.redirect)
            }else{
                alert('Something wend wrong.')
            }
            if(this.state.redirect){
                console.log('yes')
                return <Redirect to="/dashboard" />
            }

        }).catch(err=>{
            console.log(err)
        })
    }
    handleChange (e) {
        this.setState({
            [e.target.name] : e.target.value
        })
    }
    render() {
        const {username, password} = this.state;
        return(
            <div className="container">
                <div className="row">
                    <div className="col-sm-12">
                        <h1 className="text-center">Login</h1>
                        <form onSubmit={this.submitForm}>
                            <div className="form-group">
                                <label htmlFor="username">Email address</label>
                                <input type="email" className="form-control" id='username' value={username} onChange={this.handleChange} name='username' placeholder="Enter email"/>

                            </div>
                            <div className="form-group">
                                <label htmlFor="password">Password</label>
                                <input type="password" className="form-control"  id='password' value={password} onChange={this.handleChange}  name='password' placeholder="Password"/>
                            </div>
                            <button type="submit" className="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        );
    }
}

export default Login;