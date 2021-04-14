import { data } from 'jquery'
import React , {useEffect, useState}from 'react';
import axios from 'axios';

export default function posts({posts, loading,viewPost, get_category_name, categoryPosts}) {
    
    
    if(loading){
        
        return <h2>Loading</h2>
    }
    // console.log(posts[0].length)

    function get_date(date){
           let index =  date.indexOf('T');
          return date.slice(0 , index)
    }

    

    
    return (
        
        <>
               
                {
                     
                posts.map((post, index)=>{
                        
                    return (
                        <div key={index} className="col-sm-6" >
                            <div className="card">
                                <div className="card-body">
                                    <a href={'blog/'+post.data.id}><h5 className="card-title">{post.data.title}</h5></a>

                                    <p className="card-text" dangerouslySetInnerHTML={{__html:post.data.excerpt}}  />
                                    
                                    <p className="card-text">{get_date(post.data.date)} / <a  onClick={()=>categoryPosts(post.categories[0],post.categories[2])} href="#">{post.categories[1]}</a></p>

                                    <button onClick={()=>viewPost(post.data.slug)} className="btn btn-primary">ReadMore</button>
                                </div>
                            </div>
                        </div>
                    )
                    })
                }
                </>
    )
}
