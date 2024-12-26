console.log('JavaScript fonctionne correctement !');

const panierContainer = document.querySelector('#panier-container');
const viderPanierBtn = document.querySelector('#vider-panier');
const validerCommandeBtn = document.createElement('button');
const totalElement = document.querySelector('#total');

validerCommandeBtn.id = 'valider-commande';
validerCommandeBtn.textContent = 'Valider la commande';
validerCommandeBtn.style.backgroundColor = 'green';
validerCommandeBtn.style.color = 'white';
validerCommandeBtn.style.padding = '10px 20px';
validerCommandeBtn.style.borderRadius = '5px';
validerCommandeBtn.style.margin = '20px auto';
validerCommandeBtn.style.display = 'block';

const getPanier = () => JSON.parse(localStorage.getItem('panier')) || [];
const setPanier = (panier) => localStorage.setItem('panier', JSON.stringify(panier));

function afficherPanier() {
    if (!panierContainer) return;

    const panier = getPanier();
    panierContainer.innerHTML = '';

    if (panier.length === 0) {
        panierContainer.innerHTML = '<p>Votre panier est vide.</p>';
        if (totalElement) totalElement.textContent = '0 €';
        return;
    }

    panier.forEach((article, index) => {
        const articleElement = document.createElement('div');
        articleElement.classList.add('article');

        articleElement.innerHTML = `
            <img src="${article.image}" alt="${article.nom}" class="article-image">
            <div class="article-info">
                <h3>${article.nom}</h3>
                <p>Prix unitaire : ${article.prix} €</p>
                <div class="quantite-controls">
                    <button class="btn-moins" data-index="${index}">-</button>
                    <span>${article.quantite}</span>
                    <button class="btn-plus" data-index="${index}">+</button>
                </div>
                <p>Total : ${(article.prix * article.quantite).toFixed(2)} €</p>
            </div>
            <img src="/Serveur/public/Images/trash.svg" alt="Supprimer" class="btn-supprimer" data-index="${index}">
        `;
        panierContainer.appendChild(articleElement);
    });

    if (!document.querySelector('#valider-commande')) {
        panierContainer.after(validerCommandeBtn);
    }

    calculerTotal();
}

function ajouterAuPanier(article) {
    const panier = getPanier();
    const index = panier.findIndex((item) => item.nom === article.nom);

    if (index !== -1) {
        panier[index].quantite += 1;
    } else {
        panier.push({ ...article, quantite: 1 });
    }

    setPanier(panier);
    afficherNotification(`${article.nom} a été ajouté avec succès !`);
    afficherPanier();
}

function supprimerArticle(index) {
    const panier = getPanier();
    panier.splice(index, 1);
    setPanier(panier);
    afficherPanier();
}

function modifierQuantite(index, delta) {
    const panier = getPanier();
    panier[index].quantite += delta;

    if (panier[index].quantite <= 0) {
        panier.splice(index, 1);
    }

    setPanier(panier);
    afficherPanier();
}

function viderPanier() {
    setPanier([]);
    afficherPanier();
}

function calculerTotal() {
    const panier = getPanier();
    const total = panier.reduce((acc, article) => acc + article.prix * article.quantite, 0);
    if (totalElement) totalElement.textContent = `${total.toFixed(2)} €`;
}

function afficherNotification(message, couleur = 'green') {
    const notificationContainer = document.getElementById('notification-container') || createNotificationContainer();
    const notification = document.createElement('div');
    notification.textContent = message;
    notification.style.backgroundColor = couleur;
    notification.style.color = 'white';
    notification.style.padding = '10px 20px';
    notification.style.borderRadius = '5px';
    notification.style.marginTop = '10px';
    notificationContainer.appendChild(notification);
    setTimeout(() => notification.remove(), 3000);
}

function createNotificationContainer() {
    const container = document.createElement('div');
    container.id = 'notification-container';
    container.style.position = 'fixed';
    container.style.top = '20px';
    container.style.right = '20px';
    container.style.zIndex = '1000';
    document.body.appendChild(container);
    return container;
}

if (panierContainer) {
    panierContainer.addEventListener('click', (e) => {
        const index = e.target.dataset.index;

        if (e.target.classList.contains('btn-supprimer')) {
            supprimerArticle(index);
        } else if (e.target.classList.contains('btn-plus')) {
            modifierQuantite(index, 1);
        } else if (e.target.classList.contains('btn-moins')) {
            modifierQuantite(index, -1);
        }
    });
}

if (viderPanierBtn) {
    viderPanierBtn.addEventListener('click', viderPanier);
}

validerCommandeBtn.addEventListener('click', () => {
    afficherNotification('La commande a été validée avec succès !', 'green');
    viderPanier();
});

document.addEventListener('click', (e) => {
    if (e.target.classList.contains('btn-ajouter')) {
        const nom = e.target.dataset.nom;
        const prix = parseFloat(e.target.dataset.prix);
        const image = e.target.dataset.image;
        const article = { nom, prix, image };
        ajouterAuPanier(article);
    }
});

if (panierContainer) afficherPanier();

// Ajout pour la navigation des catégories
document.addEventListener('DOMContentLoaded', () => {
    const toggleNavBtn = document.getElementById('toggle-nav');
    const navDropdown = document.getElementById('categories-nav');

    if (toggleNavBtn && navDropdown) {
        toggleNavBtn.addEventListener('click', () => {
            if (navDropdown.classList.contains('hidden')) {
                navDropdown.classList.remove('hidden');
                navDropdown.classList.add('visible');
            } else {
                navDropdown.classList.remove('visible');
                navDropdown.classList.add('hidden');
            }
        });
    }
});
