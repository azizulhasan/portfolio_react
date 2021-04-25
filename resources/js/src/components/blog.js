import React , {useEffect, useState}from 'react';
import axios from 'axios';
import Posts from './posts'
import Pagination from './pagination'
import { useHistory } from "react-router";
import { setTimeout } from 'core-js';

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

    const [searchData, setSearchData] = useState([])
    const [searchLength, setSearchLength] = useState(0)

    useEffect(()=>{
            
            setLoading(true);
             const fetch_posts = (currentPage)=>{
                axios.get('https://webappick.com/wp-json/wp/v2/posts?page='+currentPage+'&per_page='+postPerPage+'&_fields=id,title,excerpt,date,slug,categories,tags').then(res=>{
                
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
                           setPosts([...new Set(posts)])
                           setLoading(false);
                           clearInterval(set_posts)
       
                       }
                   },6000)
             }
             fetch_posts(currentPage)
             // calculate total page.
            var total= 0;
            var off = 0;
            var per = 100
            const posts_count = setInterval(()=>{
                axios.get('https://webappick.com/wp-json/wp/v2/posts?per_page='+per+'&offset='+off+'&_fields=id').then(res=>{

                    if(res.status == 200){
                        if(res.data.length==100){
                            total += res.data.length
                            off += res.data.length
                            setTotalCount(total)
                            setOffset(off)
                        }else{
                            clearInterval(posts_count)
                        }
                    }
                    
                })
                
            },2000)

           
            
    },[])

    const paginate = (pageNumber) =>{

        // console.log(pageNumber)
        // return
        
        setLoading(true);
        axios.get('https://webappick.com/wp-json/wp/v2/posts?page='+((pageNumber== undefined)?2:pageNumber)+'&per_page='+postPerPage+'&_fields=id,title,excerpt,date,slug,categories,tags').then(res=>{
                
            if(res.status == 200){
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
            }
               
           })
           const set_posts = setInterval(()=>{
            
            // posts = []
               if(data.length>0){
                   setData(data)
                   setCategories(categories)
                   for(var i= 0; i< data.length; i++){
                       posts.push({data:data[i].data, categories: categories[i].categories })
                   }
                   var newPosts = [...new Set(posts)];
                   console.log(newPosts)
                   setPosts(newPosts.slice(Math.max(newPosts.length - postPerPage, 1)))
                   setLoading(false);
                   clearInterval(set_posts)

               }
           },4000)
    }
  
     


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
                },6000)
            }
        }) 
    }
    const getSearchValue = (searchText)=>{
            console.log(searchText)
            
            setLoading(true);
            if(searchText != ''){
                axios.get('https://webappick.com/wp-json/wp/v2/search?search='+searchText).then(res=>{
                    if(res.status == 200){
                        
                        setSearchLength(res.data.length)
                        console.log(searchLength)
                        for(var i = 0; i < res.data.length ; i++) {
                            
                            searchData[i] = {
                                id: res.data[i].id,
                                title:res.data[i].title,
                                url:res.data[i].url
                            };
                                
                        }
                        setTimeout(()=>{
                            setSearchData(searchData.slice(0, res.data.length))
                            setLoading(false);
                        },1000)
                        
                    }
                    
                })
                    
                        
                // const set_posts = setInterval(()=>{
                //     if(searchData.length>0){
                        
                        
                //         console.log(searchData)
                        
                //         clearInterval(set_posts)
    
                //     }
                // },1000)
                
            
            }
            
    }

    return (
        
        
        <div className="container">
            <nav className="navbar navbar-light bg-light">
                <form className="form-inline row "  style={{width: '100%'}}>
                    <input className="col-md-12 form-control-lg" onMouseLeave={(e)=>getSearchValue(e.target.value)} type="search" placeholder="Search " aria-label="Search"/>
                </form>
            </nav>
            {
                searchData.length>0
                ? <>
                <button type="button" onClick={()=>setSearchData([])} className="btn btn-primary btn-lg btn-block">Clear</button>
                {
                    searchData.map((data,i)=>{
                        return(
                            <p key={i}><a target="_blank" href={data.url}>{data.title}</a></p>
                        )
                    })
                }
                </>
                :<> <a href="/blog">Blog</a>
                    <div className="row">
                        <Posts posts={posts.slice(0, 10)} 
                        loading={loading} 
                        viewPost={viewPost} 
                        getCategoryPosts={getCategoryPosts}

                        / >
                    </div>
                    <div className="row">
                        <div className={`${totalCount==0 || totalCount == 100 ?'offset-md-4 col-md-6': 'offset-md-2 col-md-10'}`}>
                        <Pagination 
                        postsPerPage={postPerPage} 
                        totalPosts={totalCount} 
                        paginate={paginate}
                        />
                        </div>
                    </div>
                </>
            }
            
        </div>
    )
}
