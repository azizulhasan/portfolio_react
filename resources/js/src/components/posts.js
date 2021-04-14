import { data } from 'jquery'
import React , {useEffect, useState}from 'react';
import axios from 'axios';

export default function posts({posts, loading,viewPost, get_category_name, categoryPosts}) {
    
    
    if(loading){
        return <h2>Loading</h2>
    }

    function get_date(date){
           let index =  date.indexOf('T');

          return date.slice(0 , index)
    }

    

    
    return (
        <>
                {posts.map((post, index)=>{

                    return (
                        <div key={index} className="col-sm-6" >
                            <div className="card">
                                <div className="card-body">
                                    <a href={'blog/'+post.id}><h5 className="card-title">{post.title.rendered}</h5></a>

                                    <p className="card-text" dangerouslySetInnerHTML={{__html:post.excerpt.rendered}}  />
                                    
                                    <p className="card-text">{get_date(post.date)} / <a  onClick={()=>categoryPosts(post.categories)} href="#">{get_category_name(post.categories)}</a></p>

                                    <button onClick={()=>viewPost(post.slug)} className="btn btn-primary">ReadMore</button>
                                </div>
                            </div>
                        </div>
                    )
                })
                }
                </>
    )
}
