import React , {useEffect, useState}from 'react';
import axios from 'axios';
import Posts from './posts'
import Pagination from './pagination'
import {useHistory} from 'react-router'
import SingleCatBlog from './SingleCatBlog';

export default function categoryPosts(props ) {
    const [posts, setPosts] = useState([])
    const [data, setData] = useState([])
    const [categories, setCategories] = useState([])
    const [catData, setCatData] = useState([])
    const [catCategories, setCatCategories] = useState([])
    const [categoryPosts, setCategoryPosts] = useState([]);
    const [loading, setLoading] = useState(false)
    const [currentPage, setCurrentPage] = useState(1)
    const [postPerPage, setpostPerPage] = useState(10);
    const [slug, setSlug] = useState('')
    const history = useHistory();

    useEffect(()=>{
        setPosts( props.location.state.response)
    },[])

    // const indexOfLastPost = currentPage * postPerPage;
    // const indexOfFirstPost = indexOfLastPost - postPerPage;
    // const currentPosts = posts.slice(indexOfFirstPost, indexOfLastPost);
    
    

    
    const paginate = pageNumber => setCurrentPage(pageNumber)
    const viewPost = post_slug => {
        // if(!slug){
        //     props.history.push('/blog/category/'+props.location.pathname.split('/')[3]+'/'+post_slug)
        //     setSlug(props.location.pathname.split('/')[3])
        // }else{
        //     props.history.push('/blog/category/'+slug+'/'+post_slug)
        // }
        props.history.push('/blog/'+post_slug)
        console.log(post_slug)
        

    }

    const getCategoryPosts = (category_id , slug)=> {

        setLoading(true);
        axios.get('https://webappick.com/wp-json/wp/v2/posts?categories='+category_id+'&_fields=id,title,excerpt,date,slug,categories,tags').then(res=>{
           
        if(res.status == 200){
            for(var i = 0; i < res.data.length ; i++) {
                catData.push(
                    {data:{
                        id: res.data[i].id,
                        title:res.data[i].title.rendered,
                        excerpt:res.data[i].excerpt.rendered ,
                        date: res.data[i].date,
                        slug : res.data[i].slug,
                        categories:res.data[i].categories[0]
                    }}
                )
                if(res.data[i].categories[0] != ''){
                    axios.get('https://webappick.com/wp-json/wp/v2/categories/'+res.data[i].categories[0]+'?_fields=id,name,slug').then(category=>{
                        catCategories.push({categories:{id:category.data.id,name:category.data.name,slug:"/blog/category/"+category.data.slug}})
                    }) 
                }
            }
                const clear_Interval = setInterval(()=>{
                    setLoading(true);
                    if(catData.length> null){
                        setCatData(catData)
                        setCatCategories(catCategories)
                        for(var i= 0; i< catData.length; i++){
                            categoryPosts.push({data:catData[i].data, categories: catCategories[i].categories })
                        }
                        setCategoryPosts(categoryPosts)
                        history.push({
                            pathname: categoryPosts[0].categories.slug,
                            state: {
                              response: categoryPosts 
                            } 
                         });
                        setLoading(false);
                        clearInterval(clear_Interval)
                    }
                },4000)
            }
        })
            
        
       
    }


    

    return ( 
        <div className="container">
            <a href="/blog">Blog</a>
            <div className="row">
                <Posts posts={posts} 
                loading={loading} 
                viewPost={viewPost} 
                getCategoryPosts={getCategoryPosts}
                 / >
            </div>
            <div className="row">
                <div className="offset-md-4 col-md-6">
                <Pagination 
                postsPerPage={postPerPage} 
                totalPosts={posts.length} 
                paginate={paginate}
                />
                </div>
            </div>
        </div>
    )
}
