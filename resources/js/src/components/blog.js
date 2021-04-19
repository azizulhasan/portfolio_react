import React , {useEffect, useState}from 'react';
import axios from 'axios';
import Posts from './posts'
import Pagination from './pagination'
import { useHistory } from "react-router";
import { countBy } from 'lodash-es';

export default function Blog(props ) {
    const [posts, setPosts] = useState([])
    const [data, setData] = useState([])
    const [categories, setCategories] = useState([])
    const [catData, setCatData] = useState([])
    const [catCategories, setCatCategories] = useState([])
    const [loading, setLoading] = useState(false)
    const [currentPage, setCurrentPage] = useState(1)
    const [postPerPage, setpostPerPage] = useState(10);
    const [categoryPosts, setCategoryPosts] = useState([]);
    const history = useHistory();

    const [perPage, setPerPage] = useState(100)
    const [offset, setOffset] = useState(0)
    const [totalCount, setTotalCount] = useState(0)

    useEffect(()=>{
            
            setLoading(true);
             axios.get('https://webappick.com/wp-json/wp/v2/posts?page='+currentPage+'&_fields=id,title,excerpt,date,slug,categories,tags').then(res=>{
                
             for(var i = 0; i < res.data.length ; i++) {
                data.push(
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
                                categories.push({categories:{id:category.data.id,name:category.data.name,slug:category.data.slug}})

                            })
                        }
                }
                
            })
            const set_posts = setInterval(()=>{
                if(data.length>0){
                    setData(data)
                    setCategories(categories)
                    for(var i= 0; i< data.length; i++){
                        posts.push({data:data[i].data, categories: categories[i].categories })
                    }
                    setPosts(posts)
                    setLoading(false);
                    clearInterval(set_posts)

                }
            },4000)

            const posts_count = setInterval(()=>{
                var total= 0;
                var off = 0;
                var per = 100
                axios.get('https://webappick.com/wp-json/wp/v2/posts?per_page='+per+'&offset='+off+'&_fields=id').then(res=>{
                    
                    if(res.status == 200){
                        if(res.data.length==100){
                            
                            total += res.data.length
                            off += res.data.length
                            console.log(total)
                            console.log(off)
                            setTotalCount(total)
                            setOffset(off)
                            setTimeout(()=> {
                                console.log(totalCount)
                            console.log(offset)
                            console.log(total)
                            console.log(off)
                            },3000)
                            clearInterval(posts_count)
                        }else{
                            console.log('else '+totalCount)
                            console.log('else '+offset)
                            clearInterval(posts_count)
                        }
                        // clearInterval(posts_count)
                    }
                    
                })
                
            },1000)
            // https://webappick.com/wp-json/wp/v2/posts?per_page=100&offset=200&_fields=id
            
    },[])

    

  
     
    // const indexOfLastPost = currentPage * postPerPage;
    // const indexOfFirstPost = indexOfLastPost - postPerPage;
    
    
    // console.log(currentPosts)
    const paginate = pageNumber => setCurrentPage(pageNumber)


    const viewPost = post_slug => {

        props.history.push('/blog/'+post_slug)


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
                        catCategories.push({categories:{id:category.data.id,name:category.data.name,slug:category.data.slug}})
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
                            pathname:"/blog/category/"+ categoryPosts[0].categories.slug,
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
                paginate={paginate}/>
                </div>
            </div>
        </div>
    )
}
