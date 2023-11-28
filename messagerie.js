document.addEventListener("DOMContentLoaded", function () {
  const searchForm = document.getElementById("new-conversation-form");
  const conversationsList = document.getElementById("conversations-list");
  const chatMessages = document.getElementById("chat-messages");
  const sendMessageForm = document.getElementById("send-message-form");

  loadConversations();

  // Gérez le formulaire de recherche et de nouvelle conversation
  searchForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const searchTerm = document.getElementById("search-input").value;
    loadConversations(searchTerm);
  });

  sendMessageForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const messageContent = document.getElementById("message-input").value;
    const idDestinataire = getSelectedConversation();
    sendMessage(idDestinataire, messageContent);
  });

  // Fonction pour charger les conversations
  function loadConversations(searchTerm = null) {
    // Effectuez une requête AJAX ou utilisez fetch pour obtenir les conversations du serveur
    // Mettez à jour le contenu de conversationsList avec les nouvelles conversations
    // Utilisez la fonction displayConversations pour mettre à jour l'affichage

    // Exemple de requête AJAX (utilisez la bibliothèque que vous préférez, par exemple, jQuery ou fetch)
    $.ajax({
      url: "loadConversations.php", // Remplacez par le nom de votre script PHP pour charger les conversations
      method: "POST",
      data: { search: searchTerm },
      success: function (response) {
        // Mettez à jour la liste des conversations
        $("#conversationsList").html(response);
      },
      error: function (error) {
        console.error("Erreur lors du chargement des conversations:", error);
      },
    });
  }

  // Fonction pour charger les messages avec une personne spécifique
  function loadMessages(idDestinataire) {
    // Effectuez une requête AJAX ou utilisez fetch pour obtenir les messages du serveur
    // Mettez à jour le contenu de chatMessages avec les nouveaux messages
    // Utilisez la fonction displayMessages pour mettre à jour l'affichage

    // Exemple de requête AJAX (utilisez la bibliothèque que vous préférez, par exemple, jQuery ou fetch)
    $.ajax({
      url: "loadMessages.php", // Remplacez par le nom de votre script PHP pour charger les messages
      method: "POST",
      data: { idDestinataire: idDestinataire },
      success: function (response) {
        // Mettez à jour la liste des messages
        $("#chatMessages").html(response);
      },
      error: function (error) {
        console.error("Erreur lors du chargement des messages:", error);
      },
    });
  }

  // Fonction pour envoyer un message
  function sendMessage(idDestinataire, messageContent) {
    // Effectuez une requête AJAX ou utilisez fetch pour envoyer le message au serveur
    // Après avoir envoyé le message, rechargez les messages avec la personne spécifique

    // Exemple de requête AJAX (utilisez la bibliothèque que vous préférez, par exemple, jQuery ou fetch)
    $.ajax({
      url: "sendMessage.php", // Remplacez par le nom de votre script PHP pour envoyer le message
      method: "POST",
      data: { idDestinataire: idDestinataire, messageContent: messageContent },
      success: function (response) {
        // Après avoir envoyé le message, rechargez les messages
        loadMessages(idDestinataire);
      },
      error: function (error) {
        console.error("Erreur lors de l'envoi du message:", error);
      },
    });
  }

  // Fonction pour obtenir la conversation sélectionnée
  function getSelectedConversation() {
    const selectedConversation = conversationsList.querySelector(".selected");
    if (selectedConversation) {
      return selectedConversation.dataset.id;
    }
    return null;
  }
});
