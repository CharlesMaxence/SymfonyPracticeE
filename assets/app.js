import './stimulus_bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';
document.addEventListener('turbo:load', initializeAnswerDeleteButtons);
initializeAnswerDeleteButtons();

document.addEventListener('click', (event) => {
  const target = event.target;
  if (!(target instanceof Element)) {
    return;
  }

  const addButton = target.closest('.add_item_link');
  if (addButton) {
    addFormToCollection(addButton);
    return;
  }

  const removeButton = target.closest('.remove-answer');
  if (removeButton) {
    event.preventDefault();
    removeButton.closest('li')?.remove();
  }
});

function initializeAnswerDeleteButtons() {
  document.querySelectorAll('ul.answers li').forEach((answer) => {
    if (!answer.querySelector('.remove-answer')) {
      addAnswerFormDeleteLink(answer);
    }
  });
}

function addFormToCollection(button) {
  const collectionHolder = document.querySelector('.' + button.dataset.collectionHolderClass);
  if (!collectionHolder) {
    return;
  }

  const item = document.createElement('li');

  item.innerHTML = collectionHolder
    .dataset
    .prototype
    .replace(/__name__/g, collectionHolder.dataset.index);

  collectionHolder.appendChild(item);

  addAnswerFormDeleteLink(item);

  collectionHolder.dataset.index++;
}

function addAnswerFormDeleteLink(item) {
  const removeFormButton = document.createElement('button');
  removeFormButton.type = 'button';
  removeFormButton.classList.add('remove-answer');
  removeFormButton.innerText = 'Supprimer cette réponse';

  item.append(removeFormButton);
}

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
