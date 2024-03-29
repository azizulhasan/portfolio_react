import React from 'react'

export default function pagination({postsPerPage,totalPosts, paginate}) {
    const pageNumbers = [];

    for(var i = 1; i<= Math.ceil(totalPosts/postsPerPage); i++){
        pageNumbers.push(i)
    }
    return (
        <nav>
            <ul className="pagination">
             {
                    pageNumbers.map(number=>{
                       return  (
                        <li key={number} className="page-item">
                            <a onClick={()=>paginate(number)} href="#" className="page-link">{number}</a>
                        </li>
                       )
                    })
                }

            </ul>
        </nav>
    )
}
