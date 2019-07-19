import React from "react";
import Comment from "./Comment";

export default function CommentList(props) {
  return (
    <div className="commentList">
      <h5 className="text-muted mb-4">
        <span className="badge badge-success">{props.comments.length}</span>{" "}
        Comment{props.comments.length > 0 ? "s" : ""}
      </h5>

      {props.comments.length === 0 && !props.loading ? (
        <div style={{background: '#dedcdc'}}className="alert text-center alert-info">
          Be the first to comment
          <button className="btn-success float-right" style={{borderRadius: '3px', marginTop: '10px'}} >
              Reply
            </button>
        </div>
        
      ) : null}

      {props.comments.map((comment, index) => (
        <Comment key={index} comment={comment} />
      ))}
    </div>
  );
}
