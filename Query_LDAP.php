<?php

// 3. To get the email or name or any attribute
/*
    $user = Adldap::search()->users()
    ->findByDn('cn=admin ahmad,ou=manager,ou=10 Kiel,dc=regenbogen,dc=ag');
    dd($user['memberof']);

    $user = Adldap::search()->users()
    ->findByDn('cn=patric vosshall,ou=manager,ou=10 GL,dc=regenbogen,dc=ag');
    dd($user['memberof']);

*/
/*
sn          => lastname
givenname   => firstname
cn          => firstname + lastname

distinguishedname   => CN=marc vosshall,OU=manager,OU=10 GL,DC=regenbogen,DC=ag
memberof            => Which groups are in
samaccountname      => username
userprincipalname   => the email that will be used (username @ domain.com)
department          => to set the department

*/


// Working +++++++++******
//$dn = 'cn=mohammad abdulkarim,cn=users,dc=regenbogen,dc=ag';
//$user = Adldap::search()->read()->in($dn)->whereHas('objectclass')->first();
//$user = Adldap::search()->findByDn($dn);

//dd(Adldap::search()->users()->findBy('samaccountname', 'moab'));

//dd(Adldap::search()->users()->find('mohammad abdulkarim'));
//findByDn('cn=John Doe,dc=corp,dc=org')
//dd(Adldap::search()->users()
//->findByDn('cn=admin ahmad,ou=manager,ou=10 Kiel,dc=regenbogen,dc=ag'));

$user = Adldap::search()->ous()->find('10 Kiel');

$user = Adldap::search()->ous()->get();

dd($user);
