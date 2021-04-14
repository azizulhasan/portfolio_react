import React from 'react'
import ReactDom from 'react-dom'
import {BrowserRouter as Router, Route, Switch, Redirect } from "react-router-dom";
import Login from "./components/login";
import Navbar from "./components/navbar";
import Dashboard from "./components/dashboard";
import Todos from "./components/todos";
import Blog from "./components/blog";
import SingleBlog from "./components/singleblog";
import categoryPosts from "./components/categoryPosts";

import CreatePost from "./components/createPost";
class App extends React.Component{
    constructor(props) {
        super(props);
        this.state = {
            basePath: 'http://localhost/idb/1252639/laravel/portfolio/'
        }

    }

    componentDidMount(){

    }
    render() {
        return(
        <Router>
            {/* <Todos/> */}
                <Switch>
                    <Route exact path="/blog" component={Blog} />
                    <Route path="/blog/category/:cat_name" component={categoryPosts} />
                    <Route  path="/blog/:slug" component={SingleBlog} />
                    
                    <Route path="/todos" component={Todos} />
                    <Route  path="/login" component={Login} />
                    <Route path="/dashboard" component={Dashboard}/>
                    <Route path="/createpost" component={CreatePost}/>
                    <Redirect to="/blog"/>
                </Switch>
            </Router>
        );
    }
}

ReactDom.render(<App/>, document.getElementById('blog'));