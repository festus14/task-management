import React, { Component } from "react";
import "bootstrap/dist/css/bootstrap.css";
import CommentList from "./comments/CommentList";
import CommentForm from "./comments/CommentForm";
import "./index.css";
import "./App.css";
import data from './tester.json'

class Commenthold extends Component {
  constructor(props) {
    super(props);

    this.state = {
      comments: ["Jesus you love me too much o", "You should try more"],
      loading: false,
      data,
    };

    this.addComment = this.addComment.bind(this);
  }

  componentDidMount() {
    // loading
    this.setState({ loading: true });

    // get all the comments
    fetch("./tester.json")
      .then(res => res.json())
      .then(res => {
        this.setState({
          comments: res,
          loading: false
        });
      })
      .catch(err => {
        this.setState({ loading: false });
      });
  }

  /**
   * Add new comment
   * @param {Object} comment
   */
  addComment(comment) {
    this.setState({
      loading: false,
      comments: [comment, ...this.state.comments]
    });
  }

  handleSubmit = (message) => {
    let data = [{name: 'Yomi Tola', message, time: new Date(Date.now()).toLocaleString()}, ...this.state.data]
    this.setState({ data })
  }

  render() {
    return (
      <div style={{width:'80%'}}className="App container bg-light shadow">
         <div style={{display: 'flex'}}>
          <div style={{}} className="col-6  pt-1 border-right">
            <h6>Make a comment</h6>
            <CommentForm handleSubmit={this.handleSubmit} addComment={this.addComment} />
          </div>
          <div className="col-6  pt-1">
            <CommentList
              loading={this.state.loading}
              comments={this.state.data}
            />
          </div>
        </div>
      </div>
    );
  }
}

export default Commenthold;
