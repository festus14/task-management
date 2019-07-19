import React, { Component } from "react";
import SimpleModal from "./modal";
export default class CommentForm extends Component {
  constructor(props) {
    super(props);
    this.state = {
      loading: false,
      error: "",
      modalOpen: false,
      comment: {
        // name: "",
        message: ""
      }
    };

    // bind context to methods
    this.handleFieldChange = this.handleFieldChange.bind(this);
    this.onSubmit = this.onSubmit.bind(this);
  }

  toggleModal = () => {
    this.setState({ modalOpen: !this.state.modalOpen })
  }

  /**
   * Handle form input field changes & update the state
   */
  handleFieldChange = event => {
    const { value } = event.target;

    this.setState({
      ...this.state,
      comment: {
        ...this.state.comment,
        message: value
      }
  
    });
  };

  /**
   * Form submit handler
   */
  onSubmit(e) {
    // prevent default form submission
    e.preventDefault();

    // if (!this.isFormValid()) {
    //   this.setState({ error: "All fields are required." });
    //   return;
    // }

    // loading status and clear error
    this.setState({ error: "", loading: true });

    // persist the comments on server
    let { comment } = this.state;
    fetch("data", {
      method: "post",
      body: JSON.stringify(comment)
    })
      .then(res => res.json())
      .then(res => {
        if (res.error) {
          this.setState({ loading: false, error: res.error });
        } else {
          // add time return from api and push comment to parent state
          comment.time = res.time;
          this.props.addComment(comment);

          // clear the message box
          this.setState({
            loading: false,
            comment: { ...comment, message: "" }
          });
        }
      })
      .catch(err => {
        this.setState({
          error: "Something went wrong while submitting form.",
          loading: false
        });
      });
  }


  /**
   * Simple validation
   */
 
  renderError() {
    return this.state.error ? (
      <div className="alert alert-danger">{this.state.error}</div>
    ) : null;
  }

  handleSubmit = (message) => {
    this.props.handleSubmit(message)
    this.setState({ comment: { message: '' }, modalOpen: false })
  }

  render() {
    return (
      <React.Fragment>
        {/* <form method="post" onSubmit={this.onSubmit}> */}

          {/* <div className="form-group"> */}
            {/* <textarea
              onChange={this.handleFieldChange}
              value={this.state.comment.message}
              className="form-control"
              placeholder="Your Comment"
              name="message"
              rows="4"
            /> */}
          {/* </div> */}

          {this.renderError()}

          <div className="form-group">
            <SimpleModal handleSubmit={this.handleSubmit} handleFieldChange={this.handleFieldChange} comment={this.state.comment} open={this.state.modalOpen} toggleModal={this.toggleModal}/>
            <button  onClick={this.toggleModal} 
            style={{background: '', borderRadius: '3px', marginTop: '10px'}} disabled={this.state.loading} >
              Comment
            </button>
            {/* <button className="float-right" style={{background: '', borderRadius: '3px', marginTop: '10px'}} disabled={this.state.loading} >
              Reply
            </button> */}
          </div>
        {/* </form> */}
      </React.Fragment>

      
    );
  }
}
