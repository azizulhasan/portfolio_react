import React, {Component} from 'react';
import axios from "axios";

class CreatePost extends Component {
    constructor(props) {
        super(props);
        this.state = {
            title: '',
            content:'',
            status: 'publish'

        }
        this.handleChange = this.handleChange.bind(this);
        this.createPost = this.createPost.bind(this);
    }
    handleChange (e) {
        this.setState({
            [e.target.name] : e.target.value
        })
    }
    createPost(e){
        e.preventDefault();
        let authToken = localStorage.getItem('token')

        const formData = {
            title: this.state.title,
            content: this.state.content,
            status: this.state.status,
        };
        axios.post('http://localhost/azizulhasan/pro/wp-json/wp/v2/posts',formData,
            {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${ authToken }`
                }
            }).then(res=>{
            // console.log(res)
            if(res.data){
                alert('Post is created.')
            }
        }).catch(err=>{
            console.log(err);
        })
    }

    render() {
        const {title, content} = this.state;
        return (
            <div className="container">
                <div className="row">
                    <div className="col-sm-12">
                        <form onSubmit={this.createPost}>
                        <h1 className="text-center">Create Post</h1>
                            <div className="form-group">
                                <label htmlFor="title">Titile</label>
                                <input type="text" className="form-control" id='title' value={title} onChange={this.handleChange} name='title' placeholder="Enter Title"/>
                            </div>
                            <div className="form-group">
                                <label htmlFor="content">Description</label>
                                <textarea className="form-control" onChange={this.handleChange} name="content" id="content" defaultValue={content}  rows="3"></textarea>
                            </div>
                            <button type="submit" className="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        );
    }
}

export default CreatePost;