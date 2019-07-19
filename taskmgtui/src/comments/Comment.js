import React from "react";
import usericon from "../usericon.png";
import { makeStyles } from '@material-ui/core/styles';
import { blue, red } from '@material-ui/core/colors';
import Reply from '@material-ui/icons/Reply';

export default function Comment(props) {
  const { name, message, time } = props.comment;

  
  return (
    <div className="media mb-3">
      <img
        className="mr-3 bg-light rounded"
        width="25"
        height="25"
        src={usericon}
        alt={name}
      />

      <div className="media-body p-2 shadow-sm rounded bg-light border">
        <small className="float-right text-muted">{time}</small>
        <h6 className="mt-0 mb-1 text-muted">{name}</h6>
        {message}
        <a><Reply style={{float:'right'}}/></a>
        {/* <button className="btn-success float-right" style={{borderRadius: '3px', marginTop: '10px'}} >
              Reply
            </button> */}
      </div>
    </div>
  );
}
