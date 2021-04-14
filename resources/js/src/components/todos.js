import React from 'react'
import {BrowserRouter as Router, Redirect, Switch, Link} from "react-router-dom";
import Pagination from 'react-bootstrap/Pagination'
import axios from  'axios';
import { event } from 'jquery';
class Blog extends React.Component{
    constructor(props) {
        super(props);
        this.state = {
            token:'',
            posts: [],
        }
        this.getPosts = this.getPosts.bind(this);
        this.nextPage = this.nextPage.bind(this);

    }
    getPosts(){
        let authToken = localStorage.getItem('token')

        axios.get('https://webappick.com/wp-json/wp/v2/posts?page=2&_fields=id,title,content,excerpt,date').then(res=>{
            // console.log(res)

            this.setState({posts: res.data})
            console.log(this.state.posts);
        }).catch(err=>{
            console.log(err);
        })
    }
    nextPage(e){
        console.log(e)
    }
    
    
    componentDidMount() {
        this.getPosts();
    }


    render() {
        const { posts} = this.state;
        return(
            <div className="container">
                <div className="row">
                    {posts.map((post, index)=>{
                        return (
                            <div key={index} className="col-sm-6" >
                                <div className="card">
                                    <div className="card-body">
                                        <a href={'blog/'+post.id}><h5 className="card-title">{post.title.rendered}</h5></a>

                                        <p className="card-text">{post.excerpt.rendered}</p>
                                        <p className="card-text">{post.date}</p>

                                        <button onClick={()=>{this.viewPost(post.id)}} className="btn btn-primary">ReadMore</button>
                                    </div>
                                </div>
                            </div>
                        )
                    })
                    }
                </div>

                <div className="row">
                    <div className="offset-md-4 col-md-8">
                    
                    </div>
                </div>
            </div>
        );
    }
}

export default Blog;