import $ from 'jquery';

class Modal {
  constructor() {
    this.openModalButton = $(".open-modal");
    this.modal = $(".modal");
    this.closeModalButton = $(".modal__close");
    this.events();
    this.alertTrigger = $(".alert");
    this.description = $(".modal__description");
  }
  
  events() {
    // clicking the open modal button
    this.openModalButton.click(this.openModal.bind(this));
    
    // clicking the close modal button
    this.closeModalButton.click(this.closeModal.bind(this));
    
    // pushes any key
    $(document).keyup(this.keyPressHandler.bind(this));
  }
  
  keyPressHandler(e) {
    if (e.keyCode == 27) {
      this.closeModal();
    }
  }
  
  openModal() {
    this.modal.addClass("modal--is-visible");
    return false; // prevents going up the page because de href=# button property.
    
  }
  
  closeModal() {
    this.modal.removeClass("modal--is-visible");
  }
  
  hideDescription() {
    this.description.addClass("modal__description--no-visible");
  }
}

export default Modal;