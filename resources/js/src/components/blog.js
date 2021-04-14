import React , {useEffect, useState}from 'react';
import axios from 'axios';
import Posts from './posts'
import Pagination from './pagination'
import { useHistory } from "react-router";

export default function Blog(props ) {
    const [posts, setPosts] = useState([])
    const [loading, setLoading] = useState(false)
    const [currentPage, setCurrentPage] = useState(1)
    const [postPerPage, setpostPerPage] = useState(10);
    const [categories, setcategories] = useState(10);
    const history = useHistory();

    useEffect(()=>{
            
            setLoading(true);
            var lposts = []
            var k = 0;
             axios.get('https://webappick.com/wp-json/wp/v2/posts?page='+currentPage+'&_fields=id,title,excerpt,date,slug,categories').then(res=>{
                for(var i = 0; i < res.data.length ; i++) {
                  var  data= {
                        id: res.data[i].id,
                        title:res.data[i].title.rendered,
                        excerpt:res.data[i].excerpt.rendered ,
                        date: res.data[i].date,
                        slug : res.data[i].slug,
                    }
                    
                    if(res.data[i].categories[0] != ''){
                        axios.get('https://webappick.com/wp-json/wp/v2/categories/'+res.data[i].categories[0]+'?_fields=id,name,slug').then(category=>{
                            posts.push({data,  categories:[category.data.id,category.data.name,category.data.slug,]})

                            // console.log(posts)
                            lposts = posts
                        })
                    }
                }
                
            })
            .finally(()=>{
                setPosts(posts)
                
            })
            
            
    },[])

    setTimeout(() => {
        setLoading(false) 
    }, 5000);
     
    // const indexOfLastPost = currentPage * postPerPage;
    // const indexOfFirstPost = indexOfLastPost - postPerPage;
    
    
    // console.log(currentPosts)
    const paginate = pageNumber => setCurrentPage(pageNumber)


    const viewPost = post_slug => {
        console.log(post_slug);
        props.history.push('/blog/'+post_slug)
    }

    const categoryPosts = (category_id , slug)=> {

        console.log(category_id, slug)
        axios.get('https://webappick.com/wp-json/wp/v2/posts?categories='+category_id+'&_fields=id,title,excerpt,date,slug,categories,tags').then(res=>{
            // props.history.push('/blog/category/'+slug)
            // console.log(slug)

            // console.log(res.data)
            history.push({
                pathname:  "/blog/category/"+slug,
                state: {
                  response: res.data 
                } 
             });
        
        }) 
    }


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
                <Posts posts={posts} 
                loading={loading} 
                viewPost={viewPost} 
                get_category_name={get_category_name}
                categoryPosts={categoryPosts}
                 / >
            </div>
            <div className="row">
                <div className="offset-md-4 col-md-6">
                <Pagination 
                postsPerPage={postPerPage} 
                totalPosts={'100'} 
                paginate={paginate}
                />
                </div>
            </div>
        </div>
    )
}
