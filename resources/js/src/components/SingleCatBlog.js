import React, { Component } from 'react'
import {BrowserRouter as Router, Redirect, Switch, Link} from "react-router-dom";
import axios from  'axios';
export default class SingleCatBlog extends Component {
    constructor(props) {
        super(props);
        this.state = {
            post: {},
            slug:props.match.params.slug
        }
        this.getPost = this.getPost.bind(this);

    }
    getPost(){

        axios.get('https://webappick.com/wp-json/wp/v2/posts?slug='+this.state.slug).then(res=>{
        
            this.setState({post: res.data[0]})

            // console.log(this.state.post)
        }).catch(err=>{
            console.log(err);
        })
    }

    componentDidMount() {
        this.getPost();

        console.log( this.state.slug)
    }

    render() {
        const  post = this.state.post;
          
        
        if(post.id != undefined){
            return (
                <div className="container">
                    <a href="/blog">Blog</a>
                    <div className="row">
                        <div className="col-md-8" >
                            <h3>{post.title.rendered}</h3>
                            <div dangerouslySetInnerHTML={{__html:post.content.rendered}}/>
                        </div>
                    </div>
                </div>
            )
        }else{
            return (
                <div className="container">
                    <div className="row">
                        <div className="offset-sm-3 col-md-4">
                            <h1>Loading...</h1>
                        </div>
                    </div>
                </div>
            )
        }
    }
}
