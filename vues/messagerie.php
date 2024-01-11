<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../messagerie.css" />
  <link rel="stylesheet" href="../index.css" />
  <link rel="stylesheet" href="../styleguide.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <title>Messagerie</title>
</head>

<body>
  <script src="../messagerie.js"></script>
  <div class="pageTitle">
    <h2>Sélectionnez une conversation</h2>
  </div>
  <div class="pageContent">
    <form method="post" class="msgInput">
      <label for="participant-input">Envoyer un nouveau message : </label>
      <input id="participant-input" type="email" name="email" placeholder="Adresse mail du destinataire" value="<?php if (isset($email)) echo $email?>" required />
      <textarea id="message-input" class="message-id" name="message" placeholder="Tapez votre message" maxlength="255" required> <?php if (isset($msg)) echo $msg?> </textarea>
      <button type="submit">Envoyer</button>
    </form>
    <div class="msgList">
      <?php
      foreach ($receivedMessages as $message) : ?>
        <div class="receivedMsg">
          <p><strong>De :</strong> <?= $message['pren_util'] . ' ' . $message['nom_util']; ?> <strong>(<?= $message['mail_util'] ?>)</strong></p>
          <p><strong>Date :</strong> <?= $message['date_message']; ?></p>
          <p id="contenu_message"><strong>Contenu :</strong> <?= $message['contenu_message']; ?></p>
          <div class="msgButtons">
            <form method="post">
              <input id="message_id_reply" type="hidden" name="message_id_reply" value="<?= $message['id_message']; ?>">
              <button type="submit" id="reply-button">
                <img src="../images/reply.png" alt="répondre">
              </button>
            </form>
            <form method="post">
              <input type="hidden" name="message_id" value=<?php echo $message['id_message']; ?>>
              <button type="submit" class="delete-button">
                <img src="../images/delete.png" alt="croix" class="delete-img">
              </button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>

</html>