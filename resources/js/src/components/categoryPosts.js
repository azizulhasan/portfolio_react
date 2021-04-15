import React , {useEffect, useState}from 'react';
import axios from 'axios';
import Posts from './posts'
import Pagination from './pagination'

export default function categoryPosts(props ) {
    const [posts, setPosts] = useState([])
    const [loading, setLoading] = useState(false)
    const [currentPage, setCurrentPage] = useState(1)
    const [postPerPage, setpostPerPage] = useState(10);
    const [categories, setcategories] = useState(10);

    useEffect(()=>{
        // const fetchPosts = async ()=>{
        //     setLoading(true);
        //     const res = await axios.get('https://webappick.com/wp-json/wp/v2/posts?filter["categories"]='+props.match.params.cat_name+'&_fields=id,title,excerpt,date,slug,categories,tags');
        //     setPosts(res.data);
        //     setLoading(false)   
            
        // }
        // fetchPosts()
    },[])

    // const indexOfLastPost = currentPage * postPerPage;
    // const indexOfFirstPost = indexOfLastPost - postPerPage;
    // const currentPosts = posts.slice(indexOfFirstPost, indexOfLastPost);
    
    const currentPosts = props.location.state.response

    
    const paginate = pageNumber => setCurrentPage(pageNumber)
    const viewPost = post_slug => {

        console.log(post_slug);
        props.history.push('/blog/'+post_slug)
    }

    console.log(props.location.state.response)

    const  get_category_name= category_id =>{

        // axios.get('https://webappick.com/wp-json/wp/v2/categories/'+category_id[0]).then(res=>{
        //     setcategories(res.data.name)
        // })  
        return category_id[0]
    }

    return ( 
        <div className="container">
            <a href="/blog">Blog</a>
            <div className="row">
                <Posts posts={currentPosts} 
                loading={loading} 
                viewPost={viewPost} 
                 / >
            </div>
            <div className="row">
                <div className="offset-md-4 col-md-6">
                <Pagination 
                postsPerPage={postPerPage} 
                totalPosts={currentPosts.length} 
                paginate={paginate}
                />
                </div>
            </div>
        </div>
    )
}
