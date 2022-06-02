<?php
/**
 * 2D Analises Empresa de criação de Software
 *
 * @author 2D Analises
 */
$login->setId_login(base64_decode($_SESSION['id_user']));
$edit = $login->id_log("login");
$comp = $login->id_log("cad_compra");
header("Location: logout");
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <body>
        <div class="container form_alinha">
            <div class="row form_alinha_2">
                <p><i class="icon fa-arrow-circle-o-up">&emsp13;Mudar a Foto do Perfil</i></p>
                <table> 
                    <tr>
                        <td>
                            <div class="12u$">
                                <?php foreach ($edit as $mudar) { ?>                                    
                                    <figure class="user">                                         
                                        <img src="../images/img_perfil/<?php echo $mudar['foto']; ?>" /> 
                                        <figcaption>
                                            <h3>Alterar</h3>
                                        </figcaption>
                                        <div id="sobrepor">
                                            <form action="" method="POST">
                                                <input type="file" name="user_foto" onChange="atualizar();"/>
                                            </form>
                                        </div>                                        
                                    </figure>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="12u$">
                                <section>                                   
                                    Muda a foto do perfil do usuario.
                                </section>                                 
                            </div>
                        </td>
                    </tr>
                </table>  
            </div> 
            <form action="" method="POST">
                <p><i class="icon fa-upload">&emsp13;Atualização do Perfil</i></p>
                <div class="row form_alinha_2">
                    <table>
                        <a name='perfil'></a>
                        <?php foreach ($edit as $v) { ?>
                            <tr>
                                <td><div class="6u 12u$(mobile)"><input value="<?php echo $v['apelido']; ?>" type="text" name="apelido" placeholder="Como quer ser chamado" required/></div></td>
                            </tr> 
                            <tr>
                                <td><div class="6u 12u$(mobile)"><input value="<?php echo $v['nome']; ?>" type="text" name="nome" placeholder="Nome completo" required/></div></td>
                            </tr> 
                        <?php } ?>
                        <tr>
                            <td>
                                <div class="12u$">
                                    <button type="submit" name="upload"><i class="icon fa-check-square"> Atualizar</i></button>                                    
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="12u$">
                                    <section>
                                        Altere seu nome completo ou insira uma nova frase sua, voce
                                        tambem pode colocar seu primeiro nome ou um apelido que sera
                                        visto por outros usuario.                                 
                                    </section>                                 
                                </div>
                            <td>
                        </tr>
                    </table>  
                </div>                
            </form> 

            <form action="" method="POST">
                <p><i class="icon fa-edit">&emsp13;Configurando o Cadastro</i></p>
                <div class="row form_alinha_2">
                    <table>
                        <?php foreach ($comp as $c) { ?>
                            <tr>
                                <td><div class="6u 12u$(mobile)"><input value="<?php echo $c['rua']; ?>" type="text" name="rua" placeholder="Rua" required/></div></td>
                            </tr> 
                            <tr>
                                <td><div class="6u 12u$(mobile)"><input value="<?php echo $c['numero']; ?>" type="text" name="numero" placeholder="Numero" required/></div></td>
                            </tr> 
                            <tr>
                                <td><div class="6u 12u$(mobile)"><input value="<?php echo $c['complemento']; ?>" type="text" name="complemento" placeholder="Complemento" required/></div></td>
                            </tr> 
                            <tr>
                                <td><div class="6u 12u$(mobile)"><input value="<?php echo $c['bairro']; ?>" type="text" name="bairro" placeholder="Bairro" required/></div></td>
                            </tr> 
                            <tr>
                                <td><select name="estado" class="6u 12u$(mobile)">                                     
                                        <option value="<?php echo $c['estado']; ?>"><?php echo $c['estado']; ?></option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espirito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select></td>
                            </tr> 
                            <tr>
                                <td><div class="6u 12u$(mobile)"><input value="<?php echo $c['cidade']; ?>" type="text" name="cidade" placeholder="Cidade" required/></div></td>
                            </tr> 
                            <tr>
                                <td><div class="6u 12u$(mobile)"><input value="<?php echo $c['pais']; ?>" type="text" name="pais" placeholder="Pais" required/></div></td>
                            </tr> 
                        <?php } ?>
                        <tr>
                            <td>
                                <div class="12u$">
                                    <button type="submit" name="cad_compra"><i class="icon fa-check-square"> Cadastrar</i></button> 

                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="12u$">
                                    <section>
                                        Para habilitar os campos de configuração de cadastro click em cadastrar, assim
                                        os campos irão aparecer para o preenchimento das informações adicionais.
                                    </section>                                 
                                </div>
                            <td>
                        </tr>
                    </table>  
                </div>                
            </form> 
            <div class="container form_alinha"> 
                <form action="" method="POST" enctype="multipart/form-data">
                    <p><i class="icon fa-arrow-circle-o-up">&emsp13;Postar Slider de Fotos</i></p>
                    <div class="row form_alinha_2">
                        <a name='img'></a>
                        <table>                        
                            <tr>
                                <td><div class="6u 12u$(mobile)"><input type="text" name="mensagem" placeholder="Mensagem" required/></div></td>
                            </tr> 
                            <tr>
                                <td>
                                    <div id="file">
    <!--                                    <p id="texto"><i class="icon fa-image"> Add Arquivo</i></p>-->
                                        <input type="file" name="foto_top" id="foto" required/>
                                    </div>
                                </td>
                            </tr>                         
                            <tr>
                                <td>
                                    <div class="12u$">
                                        <button type="submit" name="image"><i class="icon fa-upload"> Inserir</i></button>                                    
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="12u$">
                                        <section>
                                            Insira fotos em seu slide com mensagens suas personalizadas para 
                                            cada tipo ou ocasião em que as foto estejam, deixando assim a sua
                                            pagina ainda mais com a sua cara, as fotos para uma melhor visualização 
                                            devem ser tiradas com a camera na horizontal.
                                        </section>                                 
                                    </div>
                                </td>
                            </tr>
                        </table>  
                    </div>                
                </form> 
            </div> 
        </div>         
    </body>
</html>





