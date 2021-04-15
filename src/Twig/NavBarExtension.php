<?php

namespace ICS\NavigationBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * NavBarExtension.
 *
 * @author David Dutas <david.dutas@ia.defensecdd.gouv.fr >
 */
class NavBarExtension extends AbstractExtension
{
    private $container;

    /**
     * Constructeur.
     *
     * @param RegistryInterface $doctrine
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('renderNavBar', [$this, 'renderNavBar'], [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]),
            new TwigFunction('renderNavBarJs', [$this, 'renderNavBarJs'], [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]),
            new TwigFunction('renderNavBarCss', [$this, 'renderNavBarCss'], [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]),
        ];
    }

    public function renderNavBar(Environment $twig, string $navName)
    {
        $navigation = $this->container->getParameter('navigation');

        $navbar = [];
        $navbrand = 'Navigation';
        $navbrandRoute = 'homepage';
        $navcolor = 'light';
        $navtextcolor = 'navbar-light';
        $navFixedPosition = '';
        $navBrandImage = '';
        $navBrandIcon = '';
        $searchEnabled = false;
        $searchRoute = '';

        if (array_key_exists($navName, $navigation['navbars'])) {
            $navbar = $navigation['navbars'][$navName]['items'];
            $navbrand = $navigation['navbars'][$navName]['brand'];
            $navBrandImage = $navigation['navbars'][$navName]['brandImage'];
            $navBrandIcon = $navigation['navbars'][$navName]['brandIcon'];
            $navcolor = $navigation['navbars'][$navName]['color'];
            $navFixed = $navigation['navbars'][$navName]['fixed'];

            switch ($navcolor) {
                case 'primary':
                case 'secondary':
                case 'success':
                case 'danger':
                case 'info':
                case 'dark':
                    $navtextcolor = 'navbar-dark';
            }

            switch ($navFixed) {
                case 'top':
                    $navFixedPosition = 'fixed-top';
                break;
                case 'bottom':
                    $navFixedPosition = 'fixed-bottom';
                break;
                case 'sticky':
                    $navFixedPosition = 'sticky-top';
                break;
            }

            $searchEnabled = $navigation['navbars'][$navName]['searchenabled'];
            $searchRoute = $navigation['navbars'][$navName]['searchroute'];
        }

        $userMenu = [];
        $userMenuActivate = false;
        $userMenuAuto = false;
        $userMenuLib = '';
        $userMenuConnexionLib = '';
        $userMenuConnexionRoute = '';
        $userMenuConnexionIcon = '';

        if ($navigation['usermenu']['activate']) {
            $userMenu = $navigation['usermenu']['childs'];
            $userMenuActivate = $navigation['usermenu']['activate'];
            $userMenuAuto = $navigation['usermenu']['autolib'];
            $userMenuLib = $navigation['usermenu']['lib'];
            $userMenuConnexionLib = $navigation['usermenu']['connexionlib'];
            $userMenuConnexionRoute = $navigation['usermenu']['connexionroute'];
            $userMenuConnexionIcon = $navigation['usermenu']['connexionicon'];
        }

        if ('navbar' == $navigation['navbars'][$navName]['type']) {
            return $twig->render('@Navigation/navbar.html.twig', [
                'NavigationItems' => $navbar,
                'NavigationBrand' => $navbrand,
                'NavigationBrandRoute' => $navbrandRoute,
                'NavigationColor' => $navcolor,
                'NavigationTextColor' => $navtextcolor,
                'NavigationFixed' => $navFixedPosition,
                'NavigationImage' => $navBrandImage,
                'NavigationIcon' => $navBrandIcon,
                'NavigationName' => $navName,
                'NavigationUserMenu' => $userMenu,
                'NavigationUserMenuActivate' => $userMenuActivate,
                'NavigationUserMenuAuto' => $userMenuAuto,
                'NavigationUserMenuLib' => $userMenuLib,
                'NavigationUserMenuConnexionLib' => $userMenuConnexionLib,
                'NavigationUserMenuConnexionIcon' => $userMenuConnexionIcon,
                'NavigationUserMenuConnexionRoute' => $userMenuConnexionRoute,
                'NavigationSearchEnabled' => $searchEnabled,
                'NavigationSearchRoute' => $searchRoute,
            ]);
        } elseif ('sidebar' == $navigation['navbars'][$navName]['type']) {
            return $twig->render('@Navigation/sidebar.html.twig', [
                'NavigationItems' => $navbar,
                'NavigationBrand' => $navbrand,
                'NavigationBrandRoute' => $navbrandRoute,
                'NavigationColor' => $navcolor,
                'NavigationTextColor' => $navtextcolor,
                'NavigationFixed' => $navFixedPosition,
                'NavigationImage' => $navBrandImage,
                'NavigationIcon' => $navBrandIcon,
                'NavigationName' => $navName,
                'NavigationUserMenu' => $userMenu,
                'NavigationUserMenuActivate' => $userMenuActivate,
                'NavigationUserMenuAuto' => $userMenuAuto,
                'NavigationUserMenuLib' => $userMenuLib,
                'NavigationUserMenuConnexionLib' => $userMenuConnexionLib,
                'NavigationUserMenuConnexionIcon' => $userMenuConnexionIcon,
                'NavigationUserMenuConnexionRoute' => $userMenuConnexionRoute,
                'NavigationSearchEnabled' => $searchEnabled,
                'NavigationSearchRoute' => $searchRoute,
            ]);
        }
    }

    public function renderNavBarJs(Environment $twig)
    {
        return $twig->render('@Navigation/js.html.twig');
    }

    public function renderNavBarCss(Environment $twig)
    {
        return $twig->render('@Navigation/css.html.twig');
    }
}
