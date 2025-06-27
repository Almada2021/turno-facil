<?php
// src/View/Helper/NavigationHelper.php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class NavigationHelper extends Helper
{
    protected array $helpers = ['Html', 'Url'];

    /**
     * Verifica si el usuario actual tiene al menos un negocio asociado
     */
    public function userHasBusiness(?object $user = null): bool
    {
        if (!$user) {
            return false;
        }

        $userBusinessTable = TableRegistry::getTableLocator()->get('UserBusiness');

        return $userBusinessTable->exists([
            'user_id' => $user->id
        ]);
    }

    /**
     * Obtiene el rol del usuario en sus negocios
     */
    public function getUserBusinessRole(?object $user = null): ?string
    {
        if (!$user) {
            return null;
        }

        $userBusinessTable = TableRegistry::getTableLocator()->get('UserBusiness');

        $userBusiness = $userBusinessTable->find()
            ->where(['user_id' => $user->id])
            ->first();

        return $userBusiness ? $userBusiness->role : null;
    }

    /**
     * Genera los items del menú según el tipo de usuario
     */
    public function getMenuItems(?object $user = null, string $currentRoute = ''): array
    {
        $menuItems = [];

        // Menú común para todos los usuarios autenticados
        $menuItems[] = [
            'icon' => 'bi-person-badge',
            'label' => 'Servicios',
            'url' => ['controller' => 'Pages', 'action' => 'services'],
            'active' => $currentRoute === 'services',
            'class' => 'nav-link active text-dark fw-bold',
            'show' => true
        ];

        if ($user && $this->userHasBusiness($user)) {
            // Menú para usuarios con negocio
            $businessMenuItems = [
                [
                    'icon' => 'bi-telephone',
                    'label' => 'Registros',
                    'url' => '/',
                    'active' => $currentRoute === 'registros',
                    'show' => true
                ],
                [
                    'icon' => 'bi-person-workspace',
                    'label' => 'Empleados',
                    'url' => '/user-business/employees',
                    'active' => $currentRoute === 'employees',
                    'show' => true
                ],
                [
                    'icon' => 'bi-shop',
                    'label' => 'Negocios',
                    'url' => '/my-businesses',
                    'active' => $currentRoute === 'myBusiness',
                    'show' => true
                ],
                [
                    'icon' => 'bi-bag',
                    'label' => 'Servicios y Productos',
                    'url' => '/pages/manage',
                    'active' => $currentRoute === 'manage',
                    'show' => true
                ],
                [
                    'icon' => 'bi-cash-stack',
                    'label' => 'POS',
                    'url' => '/my-businesses',
                    'active' => $currentRoute === 'pos',
                    'show' => true
                ]
            ];

            $menuItems = array_merge($menuItems, $businessMenuItems);
        } elseif ($user) {
            // Menú para usuarios sin negocio (solo clientes)
            $clientMenuItems = [
                [
                    'icon' => 'bi-calendar-check',
                    'label' => 'Mis Reservas',
                    'url' => '/bookings/my-bookings',
                    'active' => $currentRoute === 'myBookings',
                    'show' => true
                ],
                [
                    'icon' => 'bi-heart',
                    'label' => 'Favoritos',
                    'url' => '/favorites',
                    'active' => $currentRoute === 'favorites',
                    'show' => true
                ]
            ];

            $menuItems = array_merge($menuItems, $clientMenuItems);
        } else {
            // Menú para usuarios no autenticados
            $guestMenuItems = [
                [
                    'icon' => 'bi-telephone',
                    'label' => 'Contacto',
                    'url' => ['controller' => 'Pages', 'action' => 'contact'],
                    'active' => $currentRoute === 'contact',
                    'show' => true
                ]
            ];

            $menuItems = array_merge($menuItems, $guestMenuItems);
        }

        return $menuItems;
    }

    /**
     * Renderiza un item del menú
     */
    public function renderMenuItem(array $item): string
    {
        if (!$item['show']) {
            return '';
        }

        $activeClass = $item['active'] ? 'text-decoration-underline' : '';
        $iconClass = $item['icon'] ?? '';

        $link = is_array($item['url'])
            ? $this->Html->link($item['label'], $item['url'], [
                'class' => $item['class'] ?? 'nav-link active text-dark fw-bold',
                'aria-current' => 'page'
            ])
            : sprintf(
                '<a class="nav-link active text-dark fw-bold" aria-current="page" href="%s">%s</a>',
                $item['url'],
                $item['label']
            );

        return sprintf(
            '<li class="nav-item rounded d-flex align-items-center justify-content-md-center px-2 pt-1 %s">
                <i class="%s mx-2"></i>
                %s
            </li>',
            $activeClass,
            $iconClass,
            $link
        );
    }
}
