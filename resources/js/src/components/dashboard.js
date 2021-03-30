import React from 'react'
import {BrowserRouter as Router, Redirect, Switch, Link} from "react-router-dom";
import axios from  'axios';
class Dashboard extends React.Component{
    constructor(props) {
        super(props);
        this.state = {
            token:'',
            posts: [],
        }
        this.getPosts = this.getPosts.bind(this);
        this.editPost = this.editPost.bind(this);
        this.deletePost = this.deletePost.bind(this);

    }
    getPosts(){
        let authToken = localStorage.getItem('token')

        axios.get('https://webappick.com/wp-json/wp/v2/posts',{
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${ authToken }`
            }
        }
            ).then(res=>{
            // console.log(res)

            this.setState({posts: res.data})
            console.log(this.state.posts);
        }).catch(err=>{
            console.log(err);
        })
    }
    editPost(e){
        return (
            <Router>
                <Switch>
                    <Redirect to="/createpost"/>
                </Switch>
            </Router>
        )
    }
    deletePost(e) {
        console.log(e.target.id)
    }

    componentDidMount() {
        this.getPosts();
    }


    render() {
        const { posts} = this.state;
        return(
            <div className="container">
                <div className="row">
                    <div className="col-12">
                        <table className="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Title</th>
                                <th scope="col">Date</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            {posts.map(( post, index ) => {
                                return (
                                    <tr  key={index}>
                                        <th scope="row">{++index}</th>
                                        <td>{post.title.rendered}</td>
                                        <td>{post.date}</td>
                                        <td id={post.id}><button type="button" className="btn btn-sm btn-outline-warning" onClick={this.editPost} id={post.id}>Edit</button></td>
                                        <td id={post.id}><button type="button" className="btn btn-sm btn-outline-danger" onClick={this.deletePost} id={post.id}>Delete</button></td>
                                    </tr>
                                );
                            })}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        );
    }
}

export default Dashboard;