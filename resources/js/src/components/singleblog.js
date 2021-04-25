import React, { Component } from 'react'
import {BrowserRouter as Router, Redirect, Switch, Link} from "react-router-dom";
import axios from  'axios';
export default class singleblog extends Component {
    constructor(props) {
        super(props);
        this.state = {
            post: {},
            recentPosts:{},
            prop: props,
            catOrPosts: 'post',
            categories: {},
            comments:{},
            slug:props.match.params.slug,
            categoryPosts:[],
            loading:false,

        }
        this.getPost = this.getPost.bind(this);
        this.getRecentPosts = this.getRecentPosts.bind(this)
        this.viewPost = this.viewPost.bind(this)
        this.getCategories = this.getCategories.bind(this)
        this.getPostComments = this.getPostComments.bind(this)
        this.get_date = this.get_date.bind(this)
        this.getCategoryPosts = this.getCategoryPosts.bind(this) 
        this.changeImageVal = this.changeImageVal.bind(this)
        
       
    }

    changeImageVal(){
                var imgs = document.getElementsByTagName("img");
                var imgSrcs = [];
            
                for (var i = 0; i < imgs.length; i++) {
                    imgSrcs.push(imgs[i].width);
                    

                    if(window.matchMedia("(min-width: 1440px)").matches ){
                        
                        if(imgs[i].getAttribute('class') !== 'comment_author_img'){
                            imgs[i].width = '750'
                        }
                            
                    }else if(window.matchMedia("(min-width: 1024px)").matches){
                        if(imgs[i].getAttribute('class') !== 'comment_author_img'){
                            imgs[i].width = '680'
                        }
                    }else if(window.matchMedia("(min-width: 768px)").matches){
                        if(imgs[i].getAttribute('class') !== 'comment_author_img'){
                            imgs[i].width = '480'
                        }
                    }else if(window.matchMedia("(min-width: 576px)").matches){
                        if(imgs[i].getAttribute('class') !== 'comment_author_img'){
                            imgs[i].width = '500'
                        }
                    }else if(window.matchMedia("(min-width: 320px)").matches){
                        if(imgs[i].getAttribute('class') !== 'comment_author_img'){
                            imgs[i].width = '300'
                        }
                    }else{
                        if(imgs[i].getAttribute('class') !== 'comment_author_img'){
                            imgs[i].width = '250'
                        }
                    }

                    
                }

                
                // return imgSrcs;
        
        console.log(imgSrcs)
    }
    getPost(slug){
        axios.get('https://webappick.com/wp-json/wp/v2/posts?slug='+slug+'&_fields=id,title,content,excerpt,date,slug,categories,tags').then(res=>{
        
            this.getPostComments(res.data[0].id)
            this.setState({post: res.data[0]})
            this.setState({catOrPosts:'post'});
            setTimeout(()=>{
                this.changeImageVal()
            },100)

            // console.log(this.state.post)
        }).catch(err=>{
            console.log(err);
        })
    }
    getPostComments(id){
        
            console.log(id)
            axios.get('https://webappick.com/wp-json/wp/v2/comments?post='+id+'&_fields=id,post,parent,author,author_name,date,content,author_avatar_urls,author_url&orderby=id').then(res=>{
                
                if(res.status == 200){
                    if(res.data.length>1){
                        res.data.sort()
                        this.setState({comments: res.data.reverse()})
                    }else{
                        this.setState({comments: res.data})
                    }
                    
                }
                if(this.state.comments[0] != undefined){
                    
                    // this.state.comments.reverse()
                    console.log(this.state.comments.reverse())
                }
                
            }).catch(err=>{
                console.log(err);
            })
        
    }

     viewPost(post_slug) {
        this.setState({slug:post_slug})
        this.getPost(post_slug)
        this.setState({catOrPosts:'post'});
        this.state.prop.history.push('/blog/'+post_slug)
    }

    getCategories(){
        
        axios.get('https://webappick.com/wp-json/wp/v2/categories?_fields=id,name,slug').then(category=>{
            
            if(category.status == 200){
                var categories = []
                for(var i = 0; i< category.data.length; i++) {
                    categories.push({id:category.data[i].id,name:category.data[i].name,slug:category.data[i].slug})

                }
                this.setState({categories:categories})
            }

            
        })
    }

    getRecentPosts(){
        axios.get('https://webappick.com/wp-json/wp/v2/posts?categories='+this.state.post.categories[0]+'&per_page=10&_fields=id,title,slug,categories,tags').then(res=>{
        
            this.setState({recentPosts: res.data})

            // console.log(this.state.recentPosts)
        }).catch(err=>{
            console.log(err);
        })
    }
    
    componentDidMount() {
        this.getPost(this.state.slug);
        this.getCategories();
        
        

        
        const recent_posts = setInterval(()=>{
            if(this.state.post.id != undefined){
                this.getPostComments(this.state.post.id)
                this.getRecentPosts()
                clearInterval(recent_posts)
            }
        },1000)
     

        console.log( this.state.slug)
    }


     get_date(date){
        let index =  date.indexOf('T');
       return date.slice(0 , index)
    }


     getCategoryPosts(category_id , slug) {

        this.setState({loading:true});
        this.setState({catOrPosts:'cat'})
        var props = this.state.prop;
        axios.get('https://webappick.com/wp-json/wp/v2/posts?categories='+category_id+'&_fields=id,title,excerpt,date,slug,categories,tags').then(res=>{
            var catData =[]
            var catCategories = []
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
                    
                    var categoryPosts = []
                    if(catData.length> null){
                        // this.setState({catData:catData});
                        // this.setState({catCategories:catCategories});
                        for(var i= 0; i< catData.length; i++){
                            categoryPosts.push({data:catData[i].data, categories: catCategories[i].categories })
                        }
                        this.setState({categoryPosts:categoryPosts});
                        // props.push({
                        //     pathname:"/blog/category/"+ this.state.categoryPosts[0].categories.slug,
                        //     state: {
                        //       response: this.state.categoryPosts 
                        //     } 
                        //  });
                        console.log(this.state.categoryPosts)
                        this.setState({loading:false});
                        this.setState({catOrPosts:'cat'});
                        clearInterval(clear_Interval)
                    }
                },6000)
            }
        })
            
        
       
    }

    
     get_date(date){
        let index =  date.indexOf('T');
       return date.slice(0 , index)
   }


    render() {
        const  post = this.state.post;
        const recentPosts = this.state.recentPosts;
        const categories = this.state.categories;
        const comments = this.state.comments;
        const categoryStyle = {
            backgroundColor: "whiteSmoke",
            marginRight: "5px",
            fontFamily: "Arial",
            fontWeight: "bold"
          };
          
        
        if(post.id != undefined && this.state.catOrPosts == 'post'){
            return (
                <div className="container">
                    <a href="/blog">Blog</a>
                    <div className="row">
                        <div className="col-md-8" >
                            <h3>{post.title.rendered}</h3>
                            <div dangerouslySetInnerHTML={{__html:post.content.rendered}}/>
                        </div>

                        <div className="col-md-4">
                           <div className="recent_posts">
                           <h1>Recent Posts</h1>
                            
                            {recentPosts.length>0
                                ? recentPosts.map((post,index)=>{
                                   return <a key={index} onClick={()=>this.viewPost(post.slug)} href="#"><h6>{post.title.rendered}</h6></a>
                                })
                                :  <h4>Loading.</h4>
                                }
                            
                           </div>
                           <div className="categories">
                           <h1>Categores</h1>
                            
                            {categories.length>0
                                ? categories.map((category,index)=>{
                                   return <a key={index} onClick={()=>this.getCategoryPosts(category.id, category.slug)}  href="#"><span style={categoryStyle}>{category.name},</span></a>
                                })
                                :  <h4>Loading.</h4>
                                }
                            
                           </div>
                        </div>
                    </div>
                    <div className="row">
                            <div className="col-md-8"> 
                                {comments.length>0?<h1> Comments</h1>:''}
                                {comments.length>0
                                ?  comments.map((comment,index)=>{
                                   return (
                                        <div key={index} className="comment">
                                            <div className="comment_author">
                                                <img className="comment_author_img" src={comment.author_avatar_urls['48']}  />
                                                <p className="comment_author_name">{comment.author_name}</p>
                                                <p className="comment_date">{this.get_date(comment.date)}</p>
                                            </div>
                                            <div className="comment_content" dangerouslySetInnerHTML={{__html:comment.content.rendered}}/>
                                            
                                            <a date-parent={comment.parent} href="#">Reply</a>
                                        </div>
                                   );
                                })
                                :  <></>
                                }

                            </div>

                    </div>
                </div>
            )
        }else if(this.state.catOrPosts == 'cat'){
            if(this.state.catOrPosts.length>0){
                
                return (
                    <div className="container">
                            <a href="/blog">Blog</a>
                            <div className="row">
                                <div className="col-md-8" >
                                <div className="row">
                                    {
                                        this.state.loading == false?
                                        this.state.categoryPosts.map((post, index)=>{
                                            return(
                                                
                                                    <div key={index} className="col-sm-6" >
                                                        <div className="card">
                                                            <div className="card-body">
                                                                <a href="#" onClick={()=>this.viewPost(post.data.slug)} ><h5 className="card-title">{post.data.title}</h5></a>
                
                                                                <p className="card-text" dangerouslySetInnerHTML={{__html:post.data.excerpt}}  />
                                                                
                                                                <p className="card-text">{this.get_date(post.data.date)} / <a  onClick={()=>this.getCategoryPosts(post.categories.id,post.categories.slug)} href="#">{post.categories.name}</a></p>
                
                                                                <button onClick={()=>this.viewPost(post.data.slug)} className="btn btn-primary">ReadMore</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                               
                                            )
                                    
                                        })
                                        : <h4>Loading.</h4>
                                    }

                                    </div>
                                </div>
                                <div className="col-md-4">
                                    <div className="recent_posts">
                                    <h1>Recent Posts</h1>
                                        
                                        {recentPosts.length>0
                                            ? recentPosts.map((post,index)=>{
                                            return <a key={index} onClick={()=>this.viewPost(post.slug)} href="#"><h6>{post.title.rendered}</h6></a>
                                            })
                                            :  <h4>Loading.</h4>
                                            }
                                        
                                    </div>
                                    <div className="categories">
                                    <h1>Categores</h1>
                                        
                                        {categories.length>0
                                            ? categories.map((category,index)=>{
                                            return <a key={index} onClick={()=>this.getCategoryPosts(category.id, category.slug)}  href="#"><span style={categoryStyle}>{category.name},</span></a>
                                            })
                                            :  <h4>Loading.</h4>
                                            }
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    )
                    

            }else{
                return (
                    <div className="container">
                        <div className="row">
                            <div className="offset-sm-3 col-md-4">
                                <h1>There is no posts of .......</h1>
                            </div>
                        </div>
                    </div>
                )
            }
            
        }else{
            return (
                <div className="container">
                    <div className="row">
                        <div className="offset-sm-3 col-md-4">
                            <h1>Loading...</h1>
                        </div>
                    </div>
                </div>
            )
        }
    }

}
